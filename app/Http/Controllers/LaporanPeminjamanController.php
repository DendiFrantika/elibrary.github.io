<?php

namespace App\Http\Controllers;

use App\Exports\PeminjamanExport;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Mpdf\Mpdf;
class LaporanPeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $status     = $request->status;
        $startDate  = $request->start_date;
        $endDate    = $request->end_date;
        $periode    = $request->periode;
        
        $peminjamans = Peminjaman::with(['user', 'buku', 'disetujui', 'dibatalkan_oleh'])
            ->when($status, function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                return $query->whereBetween('tanggal_pinjam', [$startDate, $endDate]);
            })
            ->when($periode, function($query, $periode) {
                if ($periode == 'minggu_ini') {
                    return $query->whereBetween('tanggal_pinjam', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($periode == 'bulan_ini') {
                    return $query->whereBetween('tanggal_pinjam', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($periode == 'minggu_lalu') {
                    return $query->whereBetween('tanggal_pinjam', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($periode == 'bulan_lalu') {
                    return $query->whereBetween('tanggal_pinjam', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            })
            ->orderBy('tanggal_pinjam', 'desc')
             ->paginate(10);
            
        return view('laporan.peminjaman.index', compact('peminjamans'));
    }
    
    public function exportPDF(Request $request)
    {
        $data = $this->getReportData($request);
        $html = View::make('laporan.peminjaman.pdf', $data)->render();
        
        // Buat instance mPDF
        $mpdf = new Mpdf([
            'mode'          => 'utf-8',
            'format'        => 'A4-L',
            'margin_left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
        
        
        // Tulis konten HTML
        $mpdf->WriteHTML($html);
        
        // Output PDF
        return response()->streamDownload(function() use ($mpdf) {
            $mpdf->Output();
        }, 'laporan_peminjaman_'.now()->format('YmdHis').'.pdf');
      
    }
    
    public function exportExcel(Request $request)
    {
        $data = $this->getReportData($request);
        
        return Excel::download(new PeminjamanExport($data), 'laporan_peminjaman_'.now()->format('YmdHis').'.xlsx');
    }
    
    private function getReportData($request)
    {
        $status     = $request->status;
        $startDate  = $request->start_date;
        $endDate    = $request->end_date;
        $periode    = $request->periode;
        
        $peminjamans = Peminjaman::with(['user', 'buku', 'disetujui', 'dibatalkan_oleh'])
            ->when($status, function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                return $query->whereBetween('tanggal_pinjam', [$startDate, $endDate]);
            })
            ->when($periode, function($query, $periode) {
                if ($periode == 'minggu_ini') {
                    return $query->whereBetween('tanggal_pinjam', [now()->startOfWeek(), now()->endOfWeek()]);
                } elseif ($periode == 'bulan_ini') {
                    return $query->whereBetween('tanggal_pinjam', [now()->startOfMonth(), now()->endOfMonth()]);
                } elseif ($periode == 'minggu_lalu') {
                    return $query->whereBetween('tanggal_pinjam', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                } elseif ($periode == 'bulan_lalu') {
                    return $query->whereBetween('tanggal_pinjam', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
                }
            })
            ->orderBy('tanggal_pinjam', 'desc')
            ->get();
            
        // Statistik dasar
        $totalDenda       = $peminjamans->sum('denda');
        $totalPeminjaman  = $peminjamans->count();
        
        // Statistik berdasarkan status
        $totalMenunggu    = $peminjamans->where('status', 'menunggu')->count();
        $totalDipinjam    = $peminjamans->where('status', 'dipinjam')->count();
        $totalDikembalikan = $peminjamans->where('status', 'dikembalikan')->count();
        $totalDibatalkan  = $peminjamans->where('status', 'dibatalkan')->count();
        
        // Statistik berdasarkan role peminjam
        $totalMahasiswa   = $peminjamans->filter(function($peminjaman) {
            return $peminjaman->user && $peminjaman->user->role === 'mahasiswa';
        })->count();
        $totalDosen       = $peminjamans->filter(function($peminjaman) {
            return $peminjaman->user && $peminjaman->user->role === 'dosen';
        })->count();
        
        // Peminjam teraktif
        $peminjamTeraktif = $peminjamans->groupBy('user_id')
            ->map(function ($group) {
                $firstPeminjaman = $group->first();
                return [
                    'user' => $firstPeminjaman->user,
                    'total_peminjaman' => $group->count()
                ];
            })
            ->filter(function ($item) {
                return $item['user'] !== null;
            })
            ->sortByDesc('total_peminjaman')
            ->take(5);
        
        // Buku terpopuler
        $bukuTerpopuler = $peminjamans->groupBy('buku_id')
            ->map(function ($group) {
                return [
                    'buku' => $group->first()->buku,
                    'total_peminjaman' => $group->count()
                ];
            })
            ->sortByDesc('total_peminjaman')
            ->take(5);
        
        return [
            'peminjamans'       => $peminjamans,
            'totalDenda'        => $totalDenda,
            'totalPeminjaman'   => $totalPeminjaman,
            'totalMenunggu'     => $totalMenunggu,
            'totalDipinjam'     => $totalDipinjam,
            'totalDikembalikan' => $totalDikembalikan,
            'totalDibatalkan'   => $totalDibatalkan,
            'totalMahasiswa'    => $totalMahasiswa,
            'totalDosen'        => $totalDosen,
            'peminjamTeraktif'  => $peminjamTeraktif,
            'bukuTerpopuler'    => $bukuTerpopuler,
            'startDate'         => $startDate,
            'endDate'           => $endDate,
            'status'            => $status,
            'periode'           => $periode,
            'tanggalLaporan'    => now()->format('d F Y'),
            'printed_by'        => auth()->user()->nama_lengkap ?? 'System',
            'printed_at'        => now()->format('d/m/Y H:i'),
            'institution'       => config('app.name', 'E-Library')
        ];
    }
}