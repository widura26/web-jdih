{{-- @extends('layouts.main')

@section('container-scroller')
<div class="container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dokumenAll as $item => $document)
          <tr>
            <td>{{ $item + 1 }}</td>
            <td>{{ $document->judul }}</td>
          </tr>
      @endforeach
      @if ($dokumen->count())
        @foreach ($dokumen as $item => $dokumen)    
          <tr>
            <td>{{ $item + 1 }}</td>
            <td>
              <a href="{{ route('admin.detailDokumen', [$dokumen->id, Str::slug($dokumen->judul)]) }}" class="text-decoration-none">
                {{ $dokumen->judul }}
              </a>
            </td>
            <td>{{ $dokumen->kategori->jenis }}</td>
            @if($dokumen->dokumen == true)
                <td>File disertakan</td>
            @else
                <td>File tidak disertakan</td> 
            @endif
            <td>
              <a href="{{ route('admin.dokumenTerkait', $dokumen->id, $dokumen->judul) }}" class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                  <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
                </svg>
              </a>
            </td>
          </tr>
        @endforeach
      @else
        <td>Dokumen not found</td>
      @endif
     
    </tbody>
  </table> 
</div>

@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <title>JDIH Desa Tambong | {{ $title }}</title>
</head>
<body>
  <div class="container mt-5 p-2 border border-2 shadow-sm rounded" style="width: 50rem">
    @if ($dokumenAll->count())
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Dokumen</th>
            <th>Dokumen Terkait</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dokumenAll as $item => $document)
              <tr>
                <td>{{ $item + 1 }}</td>
                <td>{{ $document->judul }}</td>
                @if ($document->dokumen == null)
                    <td>Tidak ada</td>
                @else
                    <td>Ada</td>
                @endif
              </tr>
          @endforeach
        </tbody>
      </table> 
    @else
      <h1>Dokumen not found</h1>
    @endif
    
  </div>
</body>
</html>