<?php

namespace App\Http\Controllers;

use App\Exports\EbookExport;
use Illuminate\Http\Request;
use App\Models\Ebook;
use App\Models\EbookReading;
use App\Models\Kategori;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Peminjaman;
use Mpdf\Mpdf;

class LaporanEbookController extends Controller
{
    
    public function index(Request $request)
    {
        // Query dasar untuk ebook dengan filter
        $ebooks = Ebook::with(['kategori', 'penerbit', 'prodi', 'pengunggah'])
            ->withCount(['readings as total_dibaca'])
            ->when($request->kategori_id, function($query, $kategori_id) {
                return $query->where('kategori_id', $kategori_id);
            })
            ->when($request->prodi_id, function($query, $prodi_id) {
                return $query->where('prodi_id', $prodi_id);
            })
            ->when($request->status, function($query, $status) {
                if ($status == 'dapat_diunduh') {
                    return $query->where('izin_unduh', true);
                } elseif ($status == 'tidak_dapat_diunduh') {
                    return $query->where('izin_unduh', false);
                }
            })
            ->when($request->search, function($query, $search) {
                return $query->where('judul', 'like', '%'.$search.'%')
                            ->orWhere('penulis', 'like', '%'.$search.'%');
            })
            ->when($request->periode, function($query, $periode) {
                if ($periode == 'minggu_ini') {
                    return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($periode == 'bulan_ini') {
                    return $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($periode == 'minggu_lalu') {
                    return $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($periode == 'bulan_lalu') {
                    return $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            })
            ->orderBy('judul')
            ->paginate(10);

        // Statistik dasar dari tabel ebooks dengan filter periode
        $totalKoleksiQuery = Ebook::query();
        $totalDapatDiunduhQuery = Ebook::where('izin_unduh', true);
        $totalTidakDapatDiunduhQuery = Ebook::where('izin_unduh', false);
        
        // Terapkan filter periode pada statistik
        if ($request->periode) {
            if ($request->periode == 'minggu_ini') {
                $totalKoleksiQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                $totalDapatDiunduhQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                $totalTidakDapatDiunduhQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_ini') {
                $totalKoleksiQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                $totalDapatDiunduhQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                $totalTidakDapatDiunduhQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
            } elseif ($request->periode == 'minggu_lalu') {
                $totalKoleksiQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                $totalDapatDiunduhQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                $totalTidakDapatDiunduhQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_lalu') {
                $totalKoleksiQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                $totalDapatDiunduhQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                $totalTidakDapatDiunduhQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
            }
        }
        
        $totalKoleksi = $totalKoleksiQuery->count();
        $totalDapatDiunduh = $totalDapatDiunduhQuery->count();
        $totalTidakDapatDiunduh = $totalTidakDapatDiunduhQuery->count();
        
        // Statistik pembacaan ebook dengan filter periode
        $totalDibacaQuery = EbookReading::query();
        $pembacaAktifQuery = EbookReading::select('user_id')->groupBy('user_id');
        
        if ($request->periode) {
            if ($request->periode == 'minggu_ini') {
                $totalDibacaQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                $pembacaAktifQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_ini') {
                $totalDibacaQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                $pembacaAktifQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
            } elseif ($request->periode == 'minggu_lalu') {
                $totalDibacaQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                $pembacaAktifQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_lalu') {
                $totalDibacaQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                $pembacaAktifQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
            }
        }
        
        $totalDibaca = $totalDibacaQuery->count();
        $pembacaAktif = $pembacaAktifQuery->get()->count();
        
        // Statistik gabungan
        $totalByKategori = Kategori::withCount(['ebook' => function($query) use ($request) {
            if ($request->periode) {
                if ($request->periode == 'minggu_ini') {
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_ini') {
                    $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($request->periode == 'minggu_lalu') {
                    $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_lalu') {
                    $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            }
        }])
            ->get()
            ->map(function ($kategori) {
                return [
                    'nama' => $kategori->nama,
                    'total_ebook' => $kategori->ebook_count
                ];
            });
        
        $totalByProdi = Prodi::withCount(['ebook' => function($query) use ($request) {
            if ($request->periode) {
                if ($request->periode == 'minggu_ini') {
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_ini') {
                    $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($request->periode == 'minggu_lalu') {
                    $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_lalu') {
                    $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            }
        }])
            ->get()
            ->map(function ($prodi) {
                return [
                    'nama' => $prodi->nama,
                    'total_ebook' => $prodi->ebook_count
                ];
            });
        
        // Ebook baru dengan filter periode
        $ebookBaruQuery = Ebook::query();
        if ($request->periode) {
            if ($request->periode == 'minggu_ini') {
                $ebookBaruQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_ini') {
                $ebookBaruQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
            } elseif ($request->periode == 'minggu_lalu') {
                $ebookBaruQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_lalu') {
                $ebookBaruQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
            }
        } else {
            $ebookBaruQuery->where('created_at', '>=', now()->subDays(30));
        }
        $ebookBaru = $ebookBaruQuery->count();
        
        $ebookPopuler = Ebook::withCount(['readings as readings_count' => function($query) use ($request) {
            if ($request->periode) {
                if ($request->periode == 'minggu_ini') {
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_ini') {
                    $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($request->periode == 'minggu_lalu') {
                    $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_lalu') {
                    $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            }
        }])
            ->orderByDesc('readings_count')
            ->take(5)
            ->get();
        
        // Statistik pembacaan dengan filter periode
        $pembacaanTerakhirQuery = EbookReading::with(['ebook', 'user']);
        if ($request->periode) {
            if ($request->periode == 'minggu_ini') {
                $pembacaanTerakhirQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_ini') {
                $pembacaanTerakhirQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
            } elseif ($request->periode == 'minggu_lalu') {
                $pembacaanTerakhirQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_lalu') {
                $pembacaanTerakhirQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
            }
        }
        $pembacaanTerakhir = $pembacaanTerakhirQuery->latest()->take(5)->get();
        
        $kategoris = Kategori::all();
        $prodis = Prodi::all();
        
        return view('laporan.ebook.index', compact(
            'ebooks',
            'kategoris',
            'prodis',
            'totalKoleksi',
            'totalDapatDiunduh',
            'totalTidakDapatDiunduh',
            'totalDibaca',
            'pembacaAktif',
            'totalByKategori',
            'totalByProdi',
            'ebookBaru',
            'ebookPopuler',
            'pembacaanTerakhir'
        ));
    }
    
    public function exportPDF(Request $request)
    {
        try {
            $data = $this->getEnhancedReportData($request);
            
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4-L',
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 25,
                'margin_bottom' => 20,
                'margin_header' => 10,
                'margin_footer' => 10,
                'default_font_size' => 10,
                'orientation' => 'L'
            ]);

            // Set document metadata
            $mpdf->SetTitle('Laporan Ebook - ' . $data['tanggalLaporan']);
            $mpdf->SetAuthor($data['printed_by']);
            $mpdf->SetCreator($data['institution']);

            // Header
            $mpdf->SetHTMLHeader('
            <div style="text-align:center;border-bottom:1px solid #ddd;padding-bottom:5px;">
                <h3 style="margin:0;color:#2c3e50;">LAPORAN DATA EBOOK</h3>
                <p style="margin:5px 0 0;font-size:12px;">'.$data['institution'].' | '.$data['tanggalLaporan'].'</p>
            </div>');

            // Footer
            $mpdf->SetHTMLFooter('
            <table width="100%" style="font-size:10px;border-top:1px solid #ddd;">
                <tr>
                    <td width="33%">Halaman {PAGENO} dari {nb}</td>
                    <td width="34%" style="text-align:center">'.$data['printed_at'].'</td>
                    <td width="33%" style="text-align:right">'.$data['printed_by'].'</td>
                </tr>
            </table>');

            $html = View::make('laporan.ebook.pdf', $data)->render();
            $mpdf->WriteHTML($html);

            return response()->streamDownload(
                function() use ($mpdf) {
                    $mpdf->Output('', 'I');
                },
                'Laporan_Ebook_'.now()->format('Ymd_His').'.pdf',
                ['Content-Type' => 'application/pdf']
            );

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghasilkan PDF: '.$e->getMessage());
        }
    }

    public function exportExcel(Request $request)
    {
        $data = $this->getEnhancedReportData($request);
        
        // Prepare data for export - transform the ebookAll collection
        $exportData = [
            'ebooks'                => $data['ebookAll'],
            'totalKoleksi'         => $data['totalKoleksi'],
            'totalDapatDiunduh'     => $data['totalDapatDiunduh'],
            'totalTidakDapatDiunduh' => $data['totalTidakDapatDiunduh'],
            'totalDibaca'          => $data['totalDibaca'],
            'totalByKategori'       => $data['totalByKategori'],
            'totalByProdi'          => $data['totalByProdi'],
            'ebookPopuler'          => $data['ebookPopuler'],
            'tanggalLaporan'       => $data['tanggalLaporan']
        ];
        
        return Excel::download(
            new EbookExport($exportData, $data['tanggalLaporan']), 
            'laporan_ebook_'.now()->format('YmdHis').'.xlsx'
        );
    }

    private function getEnhancedReportData($request)
    {
        // Main ebook query with filters (same as index method)
        $ebookQuery = Ebook::with(['kategori', 'penerbit', 'prodi', 'pengunggah'])
            ->withCount(['readings as total_dibaca'])
            ->when($request->kategori_id, function($query, $kategori_id) {
                return $query->where('kategori_id', $kategori_id);
            })
            ->when($request->prodi_id, function($query, $prodi_id) {
                return $query->where('prodi_id', $prodi_id);
            })
            ->when($request->status, function($query, $status) {
                if ($status == 'dapat_diunduh') {
                    return $query->where('izin_unduh', true);
                } elseif ($status == 'tidak_dapat_diunduh') {
                    return $query->where('izin_unduh', false);
                }
            })
            ->when($request->search, function($query, $search) {
                return $query->where('judul', 'like', '%'.$search.'%')
                            ->orWhere('penulis', 'like', '%'.$search.'%');
            })
            ->when($request->periode, function($query, $periode) {
                if ($periode == 'minggu_ini') {
                    return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($periode == 'bulan_ini') {
                    return $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($periode == 'minggu_lalu') {
                    return $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($periode == 'bulan_lalu') {
                    return $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            });

        // Get paginated data for view
        $ebookPaginated = $ebookQuery->orderBy('judul')->paginate(10);
        
        // Get all data for export
        $ebookAll = $ebookQuery->orderBy('judul')->get();

        // Calculate statistics with period filter
        $totalKoleksiQuery = Ebook::query();
        $totalDapatDiunduhQuery = Ebook::where('izin_unduh', true);
        $totalTidakDapatDiunduhQuery = Ebook::where('izin_unduh', false);
        $totalDibacaQuery = EbookReading::query();
        $pembacaAktifQuery = EbookReading::select('user_id')->groupBy('user_id');
        $ebookBaruQuery = Ebook::query();
        
        // Apply period filter to statistics
        if ($request->periode) {
            if ($request->periode == 'minggu_ini') {
                $totalKoleksiQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                $totalDapatDiunduhQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                $totalTidakDapatDiunduhQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                $totalDibacaQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                $pembacaAktifQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                $ebookBaruQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_ini') {
                $totalKoleksiQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                $totalDapatDiunduhQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                $totalTidakDapatDiunduhQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                $totalDibacaQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                $pembacaAktifQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                $ebookBaruQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
            } elseif ($request->periode == 'minggu_lalu') {
                $totalKoleksiQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                $totalDapatDiunduhQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                $totalTidakDapatDiunduhQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                $totalDibacaQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                $pembacaAktifQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                $ebookBaruQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_lalu') {
                $totalKoleksiQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                $totalDapatDiunduhQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                $totalTidakDapatDiunduhQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                $totalDibacaQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                $pembacaAktifQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                $ebookBaruQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
            }
        } else {
            $ebookBaruQuery->where('created_at', '>=', now()->subDays(30));
        }
        
        $totalKoleksi = $totalKoleksiQuery->count();
        $totalDapatDiunduh = $totalDapatDiunduhQuery->count();
        $totalTidakDapatDiunduh = $totalTidakDapatDiunduhQuery->count();
        $totalDibaca = $totalDibacaQuery->count();
        $pembacaAktif = $pembacaAktifQuery->get()->count();
        $ebookBaru = $ebookBaruQuery->count();

        // Category statistics with period filter
        $totalByKategori = Kategori::withCount(['ebook' => function($query) use ($request) {
            if ($request->periode) {
                if ($request->periode == 'minggu_ini') {
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_ini') {
                    $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($request->periode == 'minggu_lalu') {
                    $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_lalu') {
                    $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            }
        }])
            ->get()
            ->map(function ($kategori) {
                return [
                    'nama' => $kategori->nama,
                    'total_ebook' => $kategori->ebook_count
                ];
            });
        
        $totalByProdi = Prodi::withCount(['ebook' => function($query) use ($request) {
            if ($request->periode) {
                if ($request->periode == 'minggu_ini') {
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_ini') {
                    $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($request->periode == 'minggu_lalu') {
                    $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_lalu') {
                    $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            }
        }])
            ->get()
            ->map(function ($prodi) {
                return [
                    'nama' => $prodi->nama,
                    'total_ebook' => $prodi->ebook_count
                ];
            });

        // Recent readings with period filter
        $pembacaanTerakhirQuery = EbookReading::with(['ebook', 'user']);
        if ($request->periode) {
            if ($request->periode == 'minggu_ini') {
                $pembacaanTerakhirQuery->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_ini') {
                $pembacaanTerakhirQuery->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
            } elseif ($request->periode == 'minggu_lalu') {
                $pembacaanTerakhirQuery->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
            } elseif ($request->periode == 'bulan_lalu') {
                $pembacaanTerakhirQuery->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
            }
        }
        $pembacaanTerakhir = $pembacaanTerakhirQuery->latest()->take(5)->get();

        // Popular ebooks with period filter
        $ebookPopuler = Ebook::withCount(['readings as readings_count' => function($query) use ($request) {
            if ($request->periode) {
                if ($request->periode == 'minggu_ini') {
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_ini') {
                    $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($request->periode == 'minggu_lalu') {
                    $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($request->periode == 'bulan_lalu') {
                    $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            }
        }])
            ->orderByDesc('readings_count')
            ->take(5)
            ->get();

        return [
            // For view
            'ebooks' => $ebookPaginated,
            'kategoris' => Kategori::all(),
            'prodis' => Prodi::all(),
            
            // Statistics
            'totalKoleksi' => $totalKoleksi,
            'totalDapatDiunduh' => $totalDapatDiunduh,
            'totalTidakDapatDiunduh' => $totalTidakDapatDiunduh,
            'totalDibaca' => $totalDibaca,
            'pembacaAktif' => $pembacaAktif,
            'ebookBaru' => $ebookBaru,
            'totalByKategori' => $totalByKategori,
            'totalByProdi' => $totalByProdi,
            'pembacaanTerakhir' => $pembacaanTerakhir,
            'ebookPopuler' => $ebookPopuler,
            
            // For export
            'ebookAll' => $ebookAll,
            'tanggalLaporan' => now()->format('d F Y'),
            'printed_by' => auth()->user()->nama_lengkap ?? 'System',
            'printed_at' => now()->format('d/m/Y H:i'),
            'institution' => config('app.name', 'E-Library'),
            
            // Filter parameters
            'kategori_id' => $request->kategori_id,
            'prodi_id' => $request->prodi_id,
            'status' => $request->status,
            'search' => $request->search,
            'periode' => $request->periode
        ];
    }
}