@extends('template._layouts')

@section('title', 'Tambah Admin')

@section('content')

<div class="col-md-10">
  <div class="card">
    <div class="card-body">
  
      <form class="forms-sample" method="post" action="{{ route('registerAdmin') }}">
        @csrf
        <div class="form-group">
          <label for="exampleInputUsername1">Nama Admin</label>
          <input type="text" class="form-control" name="nama" id="exampleInputUsername1" placeholder="Nama" value="">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">Username</label>
          <input type="text" class="form-control" name="userName" id="exampleInputUsername1" placeholder="Username" value="">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">Alamat</label>
          <input type="text" class="form-control" name="alamat" id="exampleInputUsername1" placeholder="Alamat" value="">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">No Telepon</label>
          <input type="text" class="form-control" name="noTelp" id="exampleInputUsername1" placeholder="No telepon" value="">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">Role Admin</label>
          <select class="form-control" aria-label="Default select example" name="role">
            @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-light" href="{{ route('adminView') }}" type="reset">Cancel</a>
      </form>
    </div>
  </div>
</div>

@endsection