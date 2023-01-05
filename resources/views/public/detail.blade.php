<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>JDIH Tambong | {{ $title }}</title>
</head>
<body>
  @include('partials.navpublic')

  <div class="container-detail">
    <div>
      <div class="wrapper">
        <h5>Detail Peraturan</h5>
        <div class="card">
          <div class="card-body">
            <table class="table">
              <tbody>
                <tr>
                  <td>Judul</td>
                  <td>:</td>
                  <td>{{ $document->judul }}</td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td>{{ $document->kategori->singkatan }}</td>
                </tr>
                <tr>
                  <td>Nomor</td>
                  <td>:</td>
                  <td>{{ $document->nomor }}</td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td>:</td>
                  <td>{{ $document->tahun }}</td>
                </tr>
                <tr>
                  <td>Tanggal Pengesahan</td>
                  <td>:</td>
                  <td>{{ showDate($document->tanggal_pengesahan, 'j F Y') }}</td>
                </tr>
                <tr>
                  <td>file</td>
                  <td>:</td>
                 @if ($document->dokumen == null)
                     <td>File tidak disertakan</td>
                 @else
                    <td>
                      {{-- <a href="{{ route('public.download', $document->id)}}" class="btn" style="background-color: #FED049 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                          <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                          <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Download
                      </a> --}}
                      <div class="tombol">
                        <button onclick="window.location.href ='{{ route('public.download', $document->id) }}'">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                          </svg>
                          Download
                        </button>
                        <form action="{{ route('public.review', $document->id) }}" method="get">
                          <button>
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                              <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                            </svg> --}}
                            Lihat Dokumen
                          </button>
                        </form>
                      </div>
                    </td>
                 @endif
                </tr>
                <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td>{{ $status }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="isi">
        <div class="isi-semuaDokumen-dokumenTerbaru">
      
          <div class="semua">
      
            <div class="semuaDokumen">
              <div class="dokumenTerbaru">
                <div class="judul-dokumen-terbaru">
                  <h4>Dokumen Peraturan Terkait</h4>
                </div>
                <div class="baris"> 
                  @if (count($dokumenTerkait) === 0 and count($dikaitkanDengan) === 0)
                    <div class="dokumen-not-found">
                      <h5>Not found</h5>
                    </div>
                  @else
                    @foreach ([$dokumenTerkait] as $item)
                        @foreach ($item as $dokumen)
                          <a href="{{ route('public.detailDokumen', $dokumen->id) }}" class="box-link">
                            <div class="judul-box">
                              <h5>{{ $dokumen->kategori->singkatan }} No. {{ $dokumen->nomor }} Tahun {{ $dokumen->tahun }}</h5>
                            </div>
                        
                            <div class="container-box">
                        
                              <div class="isi-box">
                                <div class="text">
                                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit nam ullam incidunt temporibus, iusto dolore sit aut eos facere vitae.</p>
                                </div>
                              </div>
                        
                            </div>
                          </a>
                        @endforeach
                    @endforeach
                    @foreach ([$dikaitkanDengan] as $item)
                        @foreach ($item as $dokumen)
                          <a href="{{ route('public.detailDokumen', $dokumen->id) }}" class="box-link">
                            <div class="judul-box">
                              <h5>{{ $dokumen->kategori->singkatan }} No. {{ $dokumen->nomor }} Tahun {{ $dokumen->tahun }}</h5>
                            </div>
                        
                            <div class="container-box">
                        
                              <div class="isi-box">
                                <p>Tentang {{ $dokumen->judul }}</p>
                              </div>
                        
                            </div>
                          </a>
                        @endforeach
                    @endforeach
                  @endif          
                </div>
              </div>
            </div>
  
            <div class="dokumenTerbaru-jumlahDokumen"> 
              <div class="dokumenTerbaru">
                <div class="judul-dokumen-terbaru">
                  <h4>Dokumen Peraturan Pengganti</h4>
                </div>
                <div class="dokumen-terbaru">
                  <div class="daftar-dokumen-terbaru">
                    @if (count($dokumenPengganti) === 0 and count($dokYangDiganti) === 0)
              
                      <div class="dokumen-not-found">
                        <h5>Not found</h5>
                      </div>
            
                    @else
            
                      @foreach ([$dokumenPengganti] as $item)
                          @foreach ($item as $dokumen)
                          <div class="daftar-dokumen-terbaru">
                            <div class="dokumen-1">
                              <h5>{{ $dokumen->pivot->statusPergantian->nama_pergantian_pasif }} : </h5>
                              <p>{{ $dokumen->judul }}</p>
                            </div>
                          </div>
                          @endforeach
                      @endforeach
            
                      @foreach ([$dokYangDiganti] as $item)
                          @foreach ($item as $dokumen)
                          <div class="daftar-dokumen-terbaru">
                            <div class="dokumen-1">
                              <h5>{{ $dokumen->pivot->statusPergantian->nama_pergantian }} : </h5>
                              <p>{{ $dokumen->judul }}</p>
                            </div>
                          </div>
                          @endforeach
                      @endforeach
                    @endif       
                  </div>
                </div>
              </div>
            </div>
      
          </div>
        </div>
      </div>
    </div>
    
  </div>

  {{-- <div class="container-dokumen">
    @if($document->dokumen !== null)
      <div class="wrapper-file">
        <div class="box-file">
          <div class="box-frame">
            <iframe src="{{ asset('storage/'. $document->dokumen) }}" width="100%" height="800px"></iframe>
          </div>
          <div class="box-kategori">
          </div>
        </div>

      </div>
    @else
    @endif
  </div> --}}
  <x-footer></x-footer>

</body>
</html>
    
