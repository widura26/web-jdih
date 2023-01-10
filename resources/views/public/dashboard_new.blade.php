<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/public2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>JDIH Tambong | {{ $title }}</title>
  </head>
  <body>
    @include('partials.navpublic')
    <div class="container-dashboard">
      <div class="homepage">
        <div class="konten">
          <div class="judul">
            <h1>JDIH Desa Tambong</h1>
            <p>Jaringan Dokumen Informasi Hukum<br>Desa tambong, Banyuwangi 2022</p>
          </div>
        </div>
      </div>
      <div class="isi">
        <div class="isi-semuaDokumen-dokumenTerbaru">
          
          <div class="semua">
            <div class="semuaDokumen">
              <div class="box-dokumen">
                <div class="baris">
                  @foreach ($dokumen as $item)
                    <a href="{{ route('public.detailDokumen', $item->id) }}" class="box-link">
    
                      <div class="judul-box">
                        <h5>{{ $item->kategori->singkatan }} No. {{ $item->nomor }} Tahun 2022</h5>
                      </div>
                  
                      <div class="container-box">
                  
                        <div class="isi-box">
                          <div class="text">
    
                            {{ $item->kategori->singkatan }} Tentang {{ $item->judul }}
                          </div>
                        </div>
                  
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
      
            <div class="dokumenTerbaru-jumlahDokumen">
      
              <div class="dokumenTerbaru">
                <div class="dokumen-terbaru">
                  <div class="judul-dokumen-terbaru">
                    <h4>Dokumen Peraturan Terbaru</h4>
                  </div>
                  <div class="daftar-dokumen-terbaru">
                    @if($dokumen->count())
                    <div class="dokumen-1">
                      <h5>{{ $dokumen[0]->judul }}</h5>
                      <p>Tentang {{ $dokumen[0]->kategori->singkatan }} Tahun 2022</p>
                    </div>
                    @endif
                  </div>
                </div>
      
              </div>
            </div>
      
          </div>
          <div class="button-semuaDokumen">
            <div class="tombol">
              <button onclick="window.location.href ='{{ route('public.semuaDokumen') }}'">
                Semua Dokumen
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <x-footer>

    </x-footer>

  </body>
</html>

