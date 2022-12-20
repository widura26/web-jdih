@extends('template._layouts')

@section('content')
  {{-- pencarian --}}
  <div class="container mt-5">
    <form action="{{ route('admin.dokumenTerkait', [ 'id' => $idDokumen ]) }}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari dokumen" name="search" value="{{ $kataKunci ?? '' }}">
        <button class="btn btn-primary" type="submit">Cari</button>
      </div>
    </form>
  </div>

  @if (isset($pilihanDokumen))
        <div class="container mt-5 p-3" style="align-items: center;">
            <form action="{{ route('admin.dokumenTerkaitProses', [ 'id' => $idDokumen ]) }}" method="post">
                @csrf
                @foreach($pilihanDokumen as $dokumen)
                  <div class="card" style="width: 65%; margin: auto;">
                    <div class="form-check">
                      {{-- <div class="card-header">{{ $dokumen->judul }}</div> --}}
                      <div class="card-body">
                        <div class="row">

                          <div class="bagian col-md-11">
                            <h5>{{ $dokumen->judul }}</h5>
                            <p>{{ $dokumen->kategori->jenis }}</p>
                            <label for="pilihan-{{ $dokumen->id }}" class="form-check-label"></label>
                          </div>
                          
                          <div class="ceklist col-md-1">
                            <input type="checkbox" name="dokumen_terkait[]" id="pilihan-{{ $dokumen->id }}" class="form-check-input" value="{{ $dokumen->id }}">
                          </div>

                        </div>

                      </div>
                    </div>
                  </div> 
                  <br> 
                @endforeach
                

                <button type="submit" class="btn btn-primary" style="position: relative; left: 45%;">Simpan</button>
                

            </form>
        </div>
    @else
        <div class="container mt-5" style="border: 1px solid #ff0000">
          <h5>cari dokumen terkait</h5>
        </div>
    @endif
@endsection