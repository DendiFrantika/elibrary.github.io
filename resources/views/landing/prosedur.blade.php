@extends('landing.app')

@section('title', 'Prosedur Kunjungan')

@section('content')
<section class="py-5 bg-light mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="section-title">Prosedur Kunjungan</h2>
                <p class="mb-4">Ikuti langkah-langkah berikut untuk mengakses layanan perpustakaan kami:</p>

                <ul class="prosedur-list">
                    @foreach($prosedurs as $prosedur)
                    <li>
                        <div class="prosedur-number">{{ $prosedur->urut }}</div>
                        <div>
                            <h5>{{ $prosedur->judul }}</h5>
                            <p class="mb-0">{{ $prosedur->deskripsi }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-5">
               <img src="{{ asset('assets/images/buku.jpg') }}" alt="..." class="img-fluid rounded about-img">

            </div>
        </div>
    </div>
</section>
@endsection
