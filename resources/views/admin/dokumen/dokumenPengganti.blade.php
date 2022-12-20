<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dokumen Pengganti | {{ $title }}</title>
</head>
<body>
  <div class="container mt-5">
    <form action="{{ route('admin.dokumenPengganti', [ 'id' => $idDokumen ]) }}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari dokumen" name="search" value="{{ $kataKunci ?? '' }}">
        <button class="btn btn-primary" type="submit">Cari</button>
      </div>
    </form>
  </div>
    @if (isset($pilihanDokumen))
        <div class="container mt-5 p-3" style="border: 1px solid #ff0000">
            <form action="{{ route('admin.dokumenPenggantiProses', [ 'id' => $idDokumen ]) }}" method="post">
                @csrf
                @foreach($pilihanDokumen as $dokumen)
                  <div class="card">
                    <div class="form-check">
                      {{-- <div class="card-header">{{ $dokumen->judul }}</div> --}}
                      <div class="card-body">
                        <h5>{{ $dokumen->judul }}</h5>
                        <p>{{ $dokumen->kategori->jenis }}</p>
                        <input type="checkbox" name="dokumen_pengganti[]" id="pilihan-{{ $dokumen->id }}" class="form-check-input" value="{{ $dokumen->id }}">
                        <div class="ceklist">
                          <label for="pilihan-{{ $dokumen->id }}" class="form-check-label"></label>
                        </div>
                        <div class="statusPergantian">
                          <label for="pilihan-{{ $dokumen->id }}" class="form-label"></label>
                          <select name="kode_pergantian" class="form-control @error('kode_pergantian') is-invalid @enderror" >
                            <option value="">-- Status --</option>
                            @foreach($status as $item)
                              <option value="{{ $item->kode_pergantian }}" {{ old('kode_pergantian') == $item->kode_pergantian ? 'selected' : null }}>{{ $item->nama_pergantian }}</option>
                            @endforeach
                          </select>
                          @error('kode_pergantian')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div> 
                  <br> 
                @endforeach
  
                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            </form>
        </div>
    @else
        <div class="container mt-5" style="border: 1px solid #ff0000">
          <h5>cari dokumen Pengganti</h5>
        </div>
    @endif
</body>
</html>