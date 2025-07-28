@extends('landing.app')

@section('title', 'Tentang Kami')

@section('content')
<section class="py-5 mt-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7803798696145!2d100.6248666735795!3d-0.24986923536862968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2ab4d5980c5bdf%3A0xe75924bdfae385b8!2sSTT%20Payakumbuh!5e0!3m2!1sid!2sid!4v1750222125071!5m2!1sid!2sid" width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Tentang Kami</h2>
                <p>E-Library adalah perpustakaan digital modern yang berdiri sejak tahun 2025.
                    Aplikasi ini dikembangkan sebagai bagian dari skripsi untuk mempermudah akses buku
                    dan referensi secara online. Kami berkomitmen menyediakan bahan bacaan yang mudah diakses,
                    mendukung budaya literasi di era digital, dan memfasilitasi pembelajaran tanpa batas ruang dan waktu.</p>

                <div class="mt-4">
                    <h5 class="fw-bold">Visi Kami:</h5>
                    <p>Menjadi Salah Satu Perguruan Tinggi yang Berkualitas dan Unggul dalam Penyelenggaraan Pendidikan Tinggi Bidang
                        Teknologi Baik di Tingkat Regional dan Nasional Pada Tahun 2025.
                    </p>

                    <h5 class="fw-bold mt-3">Misi Kami:</h5>
                    <ul class="ps-3">
                            <p>1. Menyelenggarakan Pendidikan Tinggi Secara Profesional Dengan Pembelajaran Modern</p>
                            <p>2. Melakukan Kegiatan Penelitian yang Menunjang Pembelajaran Dan Pengabdian Kepada Masyarakat Sebagai
                                bentuk Kepedulian Penerapan Ilmu</p>
                            <p>3. Membina Hubungan Kerjasama Guna Meningkatkan Kualitas, Kompetensi Lulusan
                                Dengan Semua Pihak Dalam Negri Maupun Luar Negri
                            </p>
                        </ul>
                    <ul class="ps-3">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="section-title">Kontak Kami</h2>
                <p class="lead">Kunjungi perpustakaan kami di lokasi berikut</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4 text-center">
                <div class="p-3">
                    <i class="fas fa-map-marker-alt fa-2x text-primary mb-3"></i>
                    <h5>Alamat</h5>
                    <p>Jalan Khatib Sulaiman Sawah Padang Kelurahan Sawah Padang Aur Kuning Payakumbuh Selatan Kota Payakumbuh Sumatera Barat</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="p-3">
                    <i class="fas fa-clock fa-2x text-primary mb-3"></i>
                    <h5>Jam Operasional</h5>
                    <p>Senin-kamis: 08.00 - 17.00</p>
                    <p>jum'at: 08.00 - 16.00 </p>
                    <p>Sabtu: 08:00 - 15.00</p>
                    <p>Minggu: Tutup</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="p-3">
                    <i class="fas fa-phone-alt fa-2x text-primary mb-3"></i>
                    <h5>Kontak</h5>
                    <p>
                     Telp: <a href="https://wa.me/6282383501827" target="_blank">+62 823-8350-1827</a><br>
                     Email: <a href="mailto:admin@sttpyk.ac.id">admin@sttpyk.ac.id</a><br>
                     Sekolah Tinggi Teknologi Payakumbuh: <a href="https://www.sttpyk.ac.id" target="_blank">https://www.sttpyk.ac.id</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
