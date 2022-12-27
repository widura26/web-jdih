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
        <div class="container mt-5 p-3">
            <form action="{{ route('admin.dokumenTerkaitProses', [ 'id' => $idDokumen ]) }}" method="post">
                @csrf
                <div class="kumpulan-dokumen">
                  <div class="dok"> 
                    @foreach($pilihanDokumen as $dokumen)
                      <div class="kartu">
                        <div class="card-body">
                          <h5>{{ $dokumen->judul }}</h5>
                          <p>{{ $dokumen->kategori->jenis }}</p>
                        </div>
                        <div class="card-footer">
                          <div class="form-check">
                            <label for="pilihan-{{ $dokumen->id }}" class="form-check-label">
  
                            </label>
                            <input type="checkbox" name="dokumen_terkait[]" id="pilihan-{{ $dokumen->id }}" class="form-check-input" value="{{ $dokumen->id }}">
                          </div>
                        </div>
                      </div> 
                      <br>
                    @endforeach
                  </div>

                    <button type="submit" class="tombol">Simpan</button>
                </div> 
            </form>
        </div>
    @else
        <div id="pencarian">
          <div class="bungkus">
            <div class="notif">
              <div class="notif-section">
                <h3>Dokumen Terkait</h3>
              </div>
            </div>
          </div>
        </div>
    @endif
@endsection