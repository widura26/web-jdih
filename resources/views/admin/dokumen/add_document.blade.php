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
      
      <form action="{{ route('admin.prosesTambahDokumen') }}" class="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
          <label for="judul" class="form-label">judul</label>
          <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul">
        </div>
    
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" >
            <option value="">-- Pilih Jenis Dokumen --</option>
            @foreach($category as $item)
              <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : null }}>{{ $item->jenis }}</option>
            @endforeach
          </select>
          @error('kategori_id')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="nomor" class="form-label">Nomor</label>
          <input type="text"  class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor">
        </div>
    
        {{-- <div class="mb-3">
          <label for="dokumen" class="form-label">File</label>
          <input type="file" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen" name="dokumen">
        </div> --}}
    
        <div class="mb-3">
          <label for="tanggal_pengesahan" class="form-label">Tanggal Pengesahan</label>
          <input type="date" class="form-control @error('judul') is-invalid @enderror" id="tanggal_pengesahan" name="tanggal_pengesahan">
        </div>

        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select name="status_dokumen_id" class="form-control @error('status_dokumen_id') is-invalid @enderror" >
            <option value="">-- Status --</option>
            @foreach($statusDokumen as $item)
              <option value="{{ $item->id }}" {{ old('status_dokumen_id') == $item->id ? 'selected' : null }}>{{ $item->status }}</option>
            @endforeach
          </select>
          @error('status_dokumen_id')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="button-wrap">
          <label for="upload" class="button">File</label>
          <input type="file" class="@error('dokumen') is-invalid @enderror" id="upload" name="dokumen">
        </div>
        
    
        <button type="submit" class="btn btn-primary">Submit</button>
      
      </form>
    </div>
  </div>
    
@endsection