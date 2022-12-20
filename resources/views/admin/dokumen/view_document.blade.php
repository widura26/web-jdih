@extends('template._layouts')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h4 class="font-weight-bold mb-0">RoyalUI Dashboard</h4>
      </div>
      <div>
        <a href="{{ route('admin.tambahDokumen') }}">
          <button class="btn btn-primary btn-icon-text btn-rounded">
            <i class="ti-clipboard btn-icon-prepend"></i>Tambah Data</button>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <table class="table" id="myTable" style="width: 100%">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($dokumen as $item => $data)
          <tr>
            <td>{{ $item + 1 }}</td>
            <td>{{ $data->judul }}</td>
            <td>
              <a class="btn btn-primary btn-xs" href="{{ route('admin.ubahDokumen', $data->id) }}"> <i class="ti-pencil"></i></a>
              <a class="btn btn-danger btn-xs" href="{{ route('admin.hapusDokumen', $data->id) }}"><i class="ti-trash"></i></a>
              <a class="btn btn-danger btn-xs" href="{{ route('admin.dokumenTerkait', $data->id) }}"><i class="ti-book"></i></a>
              <a class="btn btn-danger btn-xs" href="{{ route('admin.dokumenPengganti', $data->id) }}"><i class="ti-book"></i></a>
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
</div>
@endsection

