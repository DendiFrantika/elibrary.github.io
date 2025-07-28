<!-- resources/views/laporan/peminjaman/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman Buku</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; text-align: left; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .header { margin-bottom: 20px; }
        .footer { margin-top: 30px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Peminjaman Buku STT-PAYAKUMBUH</h2>
        @if(isset($periode) && $periode)
            @if($periode == 'minggu_ini')
                <p>Periode: Minggu Ini ({{ now()->startOfWeek()->format('d/m/Y') }} - {{ now()->endOfWeek()->format('d/m/Y') }})</p>
            @elseif($periode == 'bulan_ini')
                <p>Periode: Bulan Ini ({{ now()->startOfMonth()->format('d/m/Y') }} - {{ now()->endOfMonth()->format('d/m/Y') }})</p>
            @elseif($periode == 'minggu_lalu')
                <p>Periode: Minggu Lalu ({{ now()->subWeek()->startOfWeek()->format('d/m/Y') }} - {{ now()->subWeek()->endOfWeek()->format('d/m/Y') }})</p>
            @elseif($periode == 'bulan_lalu')
                <p>Periode: Bulan Lalu ({{ now()->subMonth()->startOfMonth()->format('d/m/Y') }} - {{ now()->subMonth()->endOfMonth()->format('d/m/Y') }})</p>
            @endif
        @elseif($startDate && $endDate)
            <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>
        @endif
        @if($status)
        <p>Status: {{ ucfirst($status) }}</p>
        @endif
        <p>Tanggal Cetak: {{ $tanggalLaporan }}</p>
    </div>
    
    <!-- Statistics Summary -->
    <div style="margin-bottom: 20px;">
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px; width: 25%;"><strong>Total Peminjaman:</strong></td>
                <td style="border: 1px solid #ddd; padding: 8px; width: 25%;">{{ $totalPeminjaman }}</td>
                <td style="border: 1px solid #ddd; padding: 8px; width: 25%;"><strong>Total Denda:</strong></td>
                <td style="border: 1px solid #ddd; padding: 8px; width: 25%;">Rp {{ number_format($totalDenda, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Menunggu:</strong></td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $totalMenunggu ?? 0 }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Dipinjam:</strong></td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $totalDipinjam ?? 0 }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Dikembalikan:</strong></td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $totalDikembalikan ?? 0 }}</td>
                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Dibatalkan:</strong></td>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $totalDibatalkan ?? 0 }}</td>
            </tr>
        </table>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Peminjam</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamans as $key => $peminjaman)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $peminjaman->user->nama_lengkap }}</td>
                <td>{{ $peminjaman->buku ? $peminjaman->buku->judul : 'Buku dihapus' }}</td>
                <td>{{ $peminjaman->tanggal_pinjam->format('d/m/Y') }}</td>
                <td>{{ $peminjaman->tanggal_jatuh_tempo->format('d/m/Y') }}</td>
                <td>{{ $peminjaman->tanggal_kembali ? $peminjaman->tanggal_kembali->format('d/m/Y') : '-' }}</td>
                <td>{{ ucfirst($peminjaman->status) }}</td>
                <td class="text-right">Rp {{ number_format($peminjaman->denda, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="7">Total</th>
                <th class="text-right">Rp {{ number_format($totalDenda, 0, ',', '.') }}</th>
            </tr>
            <tr>
                <th colspan="7">Total Peminjaman</th>
                <th class="text-center">{{ $totalPeminjaman }}</th>
            </tr>
        </tfoot>
    </table>
    
    <div class="footer">
        <p>Dicetak oleh sistem pada {{ now()->format('d F Y H:i:s') }}</p>
    </div>
</body>
</html>