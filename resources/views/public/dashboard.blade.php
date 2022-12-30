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

    <div class="box">
      <div class="container-pertama">
        <div class="row">
          {{-- <h1>JDIH Desa Tambong</h1> --}}
          <p>Jaringan Dokumen Informasi Hukum | Desa Tambong Banyuwangi</p>
          <p>2022</p>
        </div>
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
        @if ($dokumen->count())
          <div class="row p-4 mt-5 border">
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
        @else
          <div class="row p-4 mt-5 border">
            <div class="notif">
              <p>Tidak ada dokumen</p>
            </div>
          </div>  
        @endif
        
      </div>
      <div class="container-kedua">
        <div class="dokumen-terbaru">
          <h1>Dokumen Peraturan Terbaru</h1>
          <div class="daftar-dokumen-terbaru">
            @if($document->count())
            <div class="dokumen-1">
              <h5>{{ $document[0]->judul }}</h5>
              <p>Lorem ipsum dolor sit amet consectetur 
                adipisicing elit. Animi, necessitatibus!</p>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </body>
</html>