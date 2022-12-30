@extends('template._layouts')
@section('content')

  <div class="row">
    <div class="container mt-5 border border-2 shadow-sm rounded" style="width: 50rem">
      @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
      @endif
      @if (Session::has('error'))
        <div class="alert alert-warning">
            {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
          <b>Terjadi kesalahan pada proses input data</b> <br>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      
      <form action="{{ route('admin.prosesUbahDokumen', $document->id) }}" class="" method="post" enctype="multipart/form-data">
        {{-- @method('put') --}}
        @csrf
        <div class="form-group mb-3">
          <label for="judul" class="form-label">judul</label>
          <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul"
          name="judul" required autofocus value="{{ old('judul', $document->judul) }}">
        </div>
    
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <select name="kategori_id" class="form-control">
            @foreach($category as $item)
              @if (old('kategori_id', $document->kategori_id ) == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->singkatan }}</option>
                @else
                <option value="{{ $item->id }}">{{ $item->singkatan }}</option>
              @endif
            @endforeach
          </select>
          @error('kategori_id')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="nomor" class="form-label">Nomor</label>
          <input type="text"  class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor"
          required autofocus value="{{ old('nomor', $document->nomor) }}">
        </div>

        <div class="mb-3">
          <label for="tahun" class="form-label">Tahun</label>
          <input type="text"  class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun"
          required autofocus value="{{ old('tahun', $document->tahun) }}">
        </div>
    
        {{-- <div class="mb-3">
          <label for="dokumen" class="form-label">File</label>
          <input type="hidden" name="oldDokumen" value="{{ $document->dokumen }}">
          <input type="file" name="dokumen" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen" >
        </div> --}}

        <div class="mb-3">
          <label for="tanggal_pengesahan" class="form-label">Tanggal Pengesahan</label>
          <input type="date" class="form-control @error('tanggal_pengesahan') is-invalid @enderror" id="tanggal_pengesahan" name="tanggal_pengesahan"
          required autofocus value="{{ old('tanggal_pengesahan', $document->tanggal_pengesahan) }}">
        </div>

        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select name="status_dokumen_id" class="form-control" >
            @foreach($statusDokumen as $item)
              @if (old('status_dokumen_id', $document->status_dokumen_id ) == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->status }}</option>
              @else
                <option value="{{ $item->id }}">{{ $item->status }}</option>
              @endif
            @endforeach
          </select>
          @error('status_dokumen_id')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="button-wrap">
          <label for="upload" class="button">File</label>
          <input type="hidden" name="oldDokumen" value="{{ $document->dokumen }}">
          <input type="file" class="@error('dokumen') is-invalid @enderror" id="upload" name="dokumen">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      
      </form>
    </div>
  </div>
    
@endsection