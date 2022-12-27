<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/public2.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>JDIH Tambong | {{ $title }}</title>
  </head>
  <body>
    @include('partials.navpublic')
    {{-- <div class="box">
      <div class="container-pertama">
        <div class="row">
          <h1>JDIH Desa Tambong</h1>
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
    </div> --}}
    <div class="homepage">
      <div class="konten">
        <div class="judul">
          <h1>JDIH Desa Tambong</h1>
          <p>Jaringan Dokumen Informasi Hukum<br>Desa tambong, Banyuwangi 2022</p>
          {{-- <p>Desa Tambong, Banyuwangi 2022</p> --}}
        </div>
        <div class="pencarian">
          <form action="" method="">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari dokumen" name="search" value="">
              <button class="btn btn-dark" type="submit">Cari</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="isi">
      <div class="isi-semuaDokumen-dokumenTerbaru">

        <div class="semua">
  
          <div class="semuaDokumen">
            <div class="baris">
              @foreach ($dokumen as $item)

                {{-- <div class="kolom"> --}}
                  <div class="box-dokumen">
                    <div class="isi-box">
                      <a href="{{ route('public.detailDokumen', $item->id) }}">{{ $item->judul }}</a>
                    </div>
                    {{-- <div class="bawah-box">
                      {{ showDate($item->tanggal_pengesahan, 'j F Y') }}
                    </div> --}}
                  </div>
                {{-- </div> --}}
                
              @endforeach
            </div>
            <div class="paginate">
              <div class="pagination">
                <a href="{{ route('public.semuaDokumen') }}">Semua Dokumen</a>
              </div>
            </div>
          </div>

          <div class="dokumenTerbaru-jumlahDokumen">

            <div class="dokumenTerbaru">
              {{-- margin --}}
              <div class="dokumen-terbaru">
                {{-- padding --}}
                <h4>Dokumen Peraturan Terbaru</h4>
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

            <div class="jumlahDokumen">
              <div class="jumlah-dokumen">
                <h4>Daftar Kategori</h4>
                <div class="daftar-kategori">
                  @foreach ($category as $item)    
                    <div class="dokumen-1">
                      <h5>{{ $item->singkatan }}</h5>
                      <h1>{{ $item->dokumen->count() }}</h1>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container-footer">
      <div class="wrapper-footer">
        <div class="footer">
          <div class="footer-section">
            <h3>JDIH Desa Tambong</h3>
            <p>Copyright 2022</p>
          </div>
          <div class="footer-section">
            <h3>Peraturan</h3>
            <li><a href="">Peraturan Desa</a></li>
            <li><a href="">Peraturan Bersama Kepala Desa</a></li>
            <li><a href="">Peraturan Kepala Desa</a></li>
            <li><a href="">Surat Keputusan Kepala Desa</a></li>
          </div>
          <div class="footer-section">
            <h3>Contact</h3>
            <p>Jl. Bengawan No.5, Banyuwangi</p>
            <p>Kode pos: 68415</p>
          </div>
          <div class="footer-section">
            <h3>Social</h3>
            <p><b>Youtube: WiduraHasta</b></p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>