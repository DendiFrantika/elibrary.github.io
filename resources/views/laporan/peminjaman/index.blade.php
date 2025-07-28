@extends('layouts.app')
@section('title','Laporan Peminjaman')
@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-dark text-white border-bottom py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-filter-square me-2"></i> Filter Laporan Peminjaman</h5>
                @if(request()->hasAny(['periode', 'status', 'start_date', 'end_date']))
                <a href="{{ route('laporan.peminjaman') }}" class="btn btn-sm btn-light">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                </a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('laporan.peminjaman') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="periode" class="form-label">Periode</label>
                        <select name="periode" id="periode" class="form-select form-select-sm">
                            <option value="">Semua Periode</option>
                            <option value="minggu_ini" {{ request('periode') == 'minggu_ini' ? 'selected' : '' }}>Minggu Ini</option>
                            <option value="bulan_ini" {{ request('periode') == 'bulan_ini' ? 'selected' : '' }}>Bulan Ini</option>
                            <option value="minggu_lalu" {{ request('periode') == 'minggu_lalu' ? 'selected' : '' }}>Minggu Lalu</option>
                            <option value="bulan_lalu" {{ request('periode') == 'bulan_lalu' ? 'selected' : '' }}>Bulan Lalu</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status Peminjaman</label>
                        <select name="status" id="status" class="form-select form-select-sm">
                            <option value="">Semua Status</option>
                            <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date" class="form-control form-control-sm" 
                               value="{{ request('start_date') }}">
                    </div>
                    
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" name="end_date" id="end_date" class="form-control form-control-sm" 
                               value="{{ request('end_date') }}">
                    </div>
                </div>
                
                <div class="d-flex justify-content-end mt-4 gap-2">
                    <button type="submit" class="btn btn-sm btn-dark">
                        <i class="bi bi-funnel me-1"></i> Terapkan Filter
                    </button>
                    <a href="{{ route('laporan.peminjaman.export.pdf', request()->query()) }}" class="btn btn-sm text-white btn-danger">
                        <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
                    </a>
                    <a href="{{ route('laporan.peminjaman.export.excel', request()->query()) }}" class="btn btn-sm text-white btn-success">
                        <i class="bi bi-file-earmark-excel me-1"></i> Export Excel
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <!-- Total Peminjaman -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-book text-primary fs-4"></i>
                    </div>
                    <h3 class="mb-1">{{ $peminjamans->total() }}</h3>
                    <p class="text-muted mb-0">Total Peminjaman</p>
                </div>
            </div>
        </div>
        
        <!-- Total Denda -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-cash text-danger fs-4"></i>
                    </div>
                    <h3 class="mb-1">Rp {{ number_format($peminjamans->sum('denda'), 0, ',', '.') }}</h3>
                    <p class="text-muted mb-0">Total Denda</p>
                </div>
            </div>
        </div>
        
        <!-- Status Menunggu -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-clock text-warning fs-4"></i>
                    </div>
                    <h3 class="mb-1">{{ $peminjamans->where('status', 'menunggu')->count() }}</h3>
                    <p class="text-muted mb-0">Menunggu Persetujuan</p>
                </div>
            </div>
        </div>
        
        <!-- Status Dipinjam -->
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-arrow-right-circle text-info fs-4"></i>
                    </div>
                    <h3 class="mb-1">{{ $peminjamans->where('status', 'dipinjam')->count() }}</h3>
                    <p class="text-muted mb-0">Sedang Dipinjam</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white border-bottom py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i> Data Peminjaman</h5>
                @if(request('periode'))
                    <div class="badge bg-light text-dark">
                        <i class="bi bi-calendar me-1"></i>
                        Periode: 
                        @if(request('periode') == 'minggu_ini')
                            Minggu Ini ({{ now()->startOfWeek()->format('d/m/Y') }} - {{ now()->endOfWeek()->format('d/m/Y') }})
                        @elseif(request('periode') == 'bulan_ini')
                            Bulan Ini ({{ now()->startOfMonth()->format('d/m/Y') }} - {{ now()->endOfMonth()->format('d/m/Y') }})
                        @elseif(request('periode') == 'minggu_lalu')
                            Minggu Lalu ({{ now()->subWeek()->startOfWeek()->format('d/m/Y') }} - {{ now()->subWeek()->endOfWeek()->format('d/m/Y') }})
                        @elseif(request('periode') == 'bulan_lalu')
                            Bulan Lalu ({{ now()->subMonth()->startOfMonth()->format('d/m/Y') }} - {{ now()->subMonth()->endOfMonth()->format('d/m/Y') }})
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="50" class="bg-primary text-center text-white">#</th>
                            <th class="bg-primary text-white">Peminjam</th>
                            <th class="bg-primary text-white">Buku</th>
                            <th class="bg-primary text-center text-white">Tanggal Pinjam</th>
                            <th class="bg-primary text-center text-white">Jatuh Tempo</th>
                            <th class="bg-primary text-center text-white">Tanggal Kembali</th>
                            <th class="bg-primary text-center text-white">Status</th>
                            <th class="bg-primary text-center text-white">Denda</th>
                            <th class="bg-primary text-center text-white">Disetujui Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjamans as $key => $peminjaman)
                        <tr class="align-middle">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $peminjaman->user->nama_lengkap }}</td>
                            <td>
                                @if($peminjaman->buku)
                                    <div class="d-flex align-items-center">
                                        @if($peminjaman->buku->gambar_sampul)
                                            <img src="{{ asset('storage/'.$peminjaman->buku->gambar_sampul) }}" 
                                                 alt="{{ $peminjaman->buku->judul }}" 
                                                 class="img-thumbnail me-3" 
                                                 style="width: 40px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-secondary d-flex align-items-center justify-content-center me-3" 
                                                 style="width: 40px; height: 60px;">
                                                <i class="fas fa-book text-white"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $peminjaman->buku->judul }}</h6>
                                            <small class="text-muted">{{ $peminjaman->buku->penulis }}</small>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-danger">Buku dihapus</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $peminjaman->tanggal_pinjam->format('d/m/Y') }}</td>
                            <td class="text-center">{{ $peminjaman->tanggal_jatuh_tempo->format('d/m/Y') }}</td>
                            <td class="text-center">{{ $peminjaman->tanggal_kembali ? $peminjaman->tanggal_kembali->format('d/m/Y') : '-' }}</td>
                            <td class="text-center">
                                @php
                                    $badgeClass = [
                                        'menunggu' => 'bg-warning',
                                        'dipinjam' => 'bg-primary',
                                        'dikembalikan' => 'bg-success',
                                        'dibatalkan' => 'bg-danger'
                                    ][$peminjaman->status];
                                @endphp
                                <span class="badge {{ $badgeClass }}">
                                    {{ ucfirst($peminjaman->status) }}
                                </span>
                            </td>
                            <td class="text-center @if($peminjaman->denda != 0.00) text-danger fw-bold @else text-success @endif">
                                Rp {{ number_format($peminjaman->denda, 0, ',', '.') }}
                                @if($peminjaman->denda != 0.00)
                                    <span class="badge bg-danger ms-1">Denda</span>
                                @else
                                    <span class="badge bg-success ms-1">Tepat Waktu</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $peminjaman->disetujui ? $peminjaman->disetujui->username : '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="py-5">
                                    <i class="fas fa-book-open fa-3x text-muted mb-3"></i>
                                    <h4 class="text-muted">Tidak ada data peminjaman</h4>
                                    <p class="text-muted">Coba gunakan filter yang berbeda</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="bg-light">
                        <tr>
                            <th colspan="6" class="text-end">Total</th>
                            <th class="text-center">{{ $peminjamans->count() }} Peminjaman</th>
                            <th class="text-center">Rp {{ number_format($peminjamans->sum('denda'), 0, ',', '.') }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
        {{-- @if($peminjamans->hasPages()) --}}
        <div class="card-footer bg-light">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="text-muted mb-2 mb-md-0">
                    Menampilkan <strong>{{ $peminjamans->firstItem() }}</strong> sampai <strong>{{ $peminjamans->lastItem() }}</strong> dari <strong>{{ $peminjamans->total() }}</strong> entri
                </div>
                <div>
                    {{ $peminjamans->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        {{-- @endif --}}
    </div>
</div>
@endsection