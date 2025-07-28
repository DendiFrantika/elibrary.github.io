  @include('layouts.header')
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      @include('layouts.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('layouts.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           <div class="row">
              <!-- [ Sample Page ] mulai -->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h2 class="text-light">@yield('title')</h2>  <!-- Menampilkan judul halaman yang akan diatur di section 'title' -->
                  </div>
                  <div class="card-body">
                    @yield('content')  <!-- Menampilkan konten dinamis dari halaman yang menggunakan layout ini -->
                  </div>
                </div>
              </div>
              <!-- [ Sample Page ] selesai -->
            </div>
          </div>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('layouts.footer')
  </body>
</html>
