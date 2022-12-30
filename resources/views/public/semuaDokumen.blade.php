<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('assets/css/public3.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>{{ $title }}</title>
</head>
<body>
  @include('partials.navpublic')
  <div class="bagian-search">
    <div class="search">
      <form action="{{ route('public.semuaDokumen') }}">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari dokumen" name="search">
          <button class="btn btn-primary" type="submit">Cari</button>
        </div>
      </form>
    </div>
  </div>
  
  <div class="bagian-dokumen">
    <div class="container-dokumen">
      @foreach ($dokumen as $item)
        <div class="box">
          <h5>{{ $item->kategori->singkatan }} No. {{ $item->nomor }} Tahun 2022</h5>
          <div class="isi">
            <a href="{{ route('public.detailDokumen', $item->id) }}">{{ $item->judul }}</a>
          </div>
        </div> 
      @endforeach
    </div>
    <div class="pagination">
      {{ $dokumen->links() }}
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