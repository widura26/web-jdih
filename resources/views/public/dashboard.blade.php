<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/public.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>JDIH Tambong | {{ $title }}</title>
  </head>
  <body>
    @include('partials.navpublic')

    {{-- <div class="container-dasboard"> --}}
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Peraturan desa</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">10</h3>
                  <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>  
                <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ml-1"><small>(30 days)</small></span></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Peraturan desa</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">10</h3>
                  <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>  
                <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ml-1"><small>(30 days)</small></span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <form action="" method="">
              <div class="input-group mb-3 pt-4">
                <input type="text" class="form-control" placeholder="Cari dokumen" name="search" value="">
                <button class="btn btn-dark" type="submit">Cari</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="container mt-5">
        <div class="row p-2">
          @foreach ($dokumen as $item)
            <div class="col-md-4 mb-3">
              <div class="card" style="height: 200px">
                <div class="card-body">
                  <a href="{{ route('public.detailDokumen', $item->id) }}" class="text-decoration-none" style="color: black">{{ $item->judul }}</a>
                </div>
                <div class="card-footer">
                  {{ showDate($item->tanggal_pengesahan, 'j F Y') }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    {{-- </div> --}}
  </body>
</html>