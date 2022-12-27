<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/public.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>JDIH Tambong | {{ $title }}</title>
</head>
<body>
  @include('partials.navpublic')
  <section>
    <div class="box-detail">
      <div class="container-pertama-detail">
        <div class="row">
          <h3>{{ $document->judul }}</h3>
        </div>
        <div class="row mt-5">
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
                        <a href="" class="btn" style="background-color: #FED049 ">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                          </svg>
                          Download
                        </a>
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
      </div>
      <div class="container-kedua-detail">
          <div class="dokumen-terkait">
            <h1>Dokumen Peraturan Terkait</h1>
            <div class="daftar-dokumen-terkait">
              @if (count($dokumenTerkait) === 0 and count($dikaitkanDengan) === 0)
                  <div class="dokumen-not-found">
                    <h5>Not found</h5>
                  </div>
              @else
                  @foreach ([$dokumenTerkait] as $no)
                      @foreach ($no as $dokumen)
                        <div class="dokumen">
                          <a href="">{{ $dokumen->judul }}</a>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, quidem!</p>
                        </div>
                      @endforeach
                  @endforeach
                  @foreach ([$dikaitkanDengan] as $no)
                      @foreach ($no as $dokumen)
                        <div class="dokumen">
                          <a href="">{{ $dokumen->judul }}</a>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, quibusdam.</p>
                        </div>
                      @endforeach
                  @endforeach
              @endif
            </div>
          </div>
          <div class="dokumen-pengganti">
            <h1>Dokumen Peraturan Pengganti</h1>
            <div class="daftar-dokumen-pengganti">
              @if (count($dokumenPengganti) === 0 and count($dokYangDiganti) === 0)
                  <div class="dokumen-not-found">
                    <h5>Not found</h5>
                  </div>
              @else
                  @foreach ([$dokumenPengganti] as $no)
                      @foreach ($no as $dokumen)
                        <div class="dokumen">
                          <h5>{{ $dokumen->pivot->statusPergantian->nama_pergantian_pasif }} : </h5>
                          <a href="">{{ $dokumen->judul }}</a>
                        </div>
                      @endforeach
                  @endforeach
                  @foreach ([$dokYangDiganti] as $no)
                      @foreach ($no as $dokumen)
                        <div class="dokumen">
                          <h5>{{ $dokumen->pivot->statusPergantian->nama_pergantian_pasif }} : </h5>
                          <a href="">{{ $dokumen->judul }}</a>
                        </div>
                      @endforeach
                  @endforeach
              @endif
            </div>
          </div>
      </div>
    </div>
  </section>
  <section>
    @if ($document->dokumen !== null)
      <div class="box-detail">

        <div class="container-pertama-detail">
          <iframe src="{{ asset('storage/'. $document->dokumen) }}" width="100%" height="800" frameBorder="0"></iframe>
        </div>

        <div class="container-kedua-detail">
          <div class="semua-dokumen">
            <h1>Dokumen Peraturan Lainnya</h1>
            <div class="daftar-dokumen-lain">
              @foreach ($dokumen as $dok)
                <div class="dokumen">
                  <h5>{{ $dok->judul }}</h5>
                  <a href="">{{ $dok->kategori->singkatan }}</a>
                </div>
              @endforeach
            </div>
          </div>
        </div>

      </div>
    @else
      <div class="box-detail">
        <div class="container-pertama-detail">
          <iframe src="" frameborder="0" width="100%" height="800"></iframe>
        </div>
        <div class="container-kedua-detail">
          <div class="semua-dokumen">
            <h1>Dokumen Peraturan Lainnya</h1>
            <div class="daftar-dokumen-lain">
            </div>
          </div>
        </div>
      </div>
    @endif
  </section>
  <div id="contact">
    <div class="wrapper">
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
      {{-- <div class="footer">
        <div class="footer-section">
          <h3>JDIH Tambong</h3>
          <p>Lorem ipsum dolor sit amet 
            consectetur adipisicing elit. Sunt, hic!</p>
        </div>
        <div class="footer-section">
          <h3>About</h3>
          <p>Lorem ipsum dolor sit amet 
            consectetur adipisicing elit. Sunt, hic!</p>
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
      </div> --}}
    </div>
  </div>
</body>
</html>
    
