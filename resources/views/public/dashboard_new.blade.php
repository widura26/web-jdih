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
            <h1>Selamat Datang</h1>
            <p>Jaringan Dokumen Informasi Hukum<br>Desa tambong Banyuwangi</p>
          </div>
        </div>
      </div>
      {{-- <div class="isi">
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
      </div> --}}
      <div class="bagian-dokumen">
        <div class="container-dokumen">
          <div class="judul-bagian">
            <h3>Daftar Peraturan</h3>
          </div>
          <div class="baris-kolom-dokumen">
            @foreach ($dokumen as $item)
              <a href="{{ route('public.detailDokumen', $item->id) }}" class="box-dokumen">

                <div class="box-judul">
                  <h5>{{ $item->kategori->singkatan }} No. {{ $item->nomor }} Tahun 2022</h5>
                </div>
            
                <div class="box-isi">
                  <div class="text">{{ $item->kategori->singkatan }} Tentang {{ $item->judul }}</div>
                </div>

                <div class="box-footer">
                  <div class="tanggal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                      <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                      <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    {{ showDate($item->tanggal_pengesahan, 'j F Y') }}
                  </div>
                </div>

              </a>
            @endforeach
          </div>
          <div class="button-semuaDokumen">
            <div class="tombol">
              <button onclick="window.location.href ='{{ route('public.semuaDokumen') }}'">
                Semua Dokumen
              </button>
            </div>
          </div>
        </div>
        <div class="dokumen-kategori">
          <div class="judul-bagian">
            <h3>Peraturan Terbaru</h3>
          </div>
          <div class="new-dokumen-kategori">
            {{-- <div class="new-dokumen">
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
            </div> --}}
            <div class="new-dokumen">
              <div class="dokumen-terbaru">
                @if($dokumen->count())
                <div class="dokumen-1">
                  <h5>{{ $dokumen[0]->judul }}</h5>
                  <p>Tentang {{ $dokumen[0]->kategori->singkatan }} Tahun 2022</p>
                  <div class="date">
                    <p>Dipublikasi pada {{ $dokumen[0]->created_at }}</p>
                  </div>
                </div>
                @endif
              </div>
            </div>
            {{-- <div class="kategori">
              <div class="daftar-kategori">
                @foreach ($category as $item)
                  <div class="jenis-kategori">
                    <h5>{{ $item->singkatan }}</h5>
                    <h3>{{ $item->dokumen->count() }}</h3>
                  </div>
                @endforeach
              </div>
            </div> --}}
            <div class="category">
              <div class="category-list">
                @foreach ($category as $item)
                  {{-- <div class="kind-category">
                    <div class="jenis">
                      <span>{{ $item->singkatan }}</span>
                    </div>
                    <div class="jumlah">
                      <span>{{ $item->dokumen->count() }}</span>
                    </div>
                  </div> --}}
                  <li>{{ $item->singkatan }} : {{ $item->dokumen->count() }} Peraturan</li>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <x-footer>

    </x-footer>

  </body>
</html>

