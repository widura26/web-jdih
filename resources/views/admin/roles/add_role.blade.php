@extends('template._layouts')

@section('title', 'Role Access')

@section('content')

<div class="col-md-10">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Default form</h4>
      <p class="card-description">
        Basic form layout
      </p>
      <form class="forms-sample" method="post" action="{{ route('roleInput') }}">
        @csrf
        <div class="form-group">
          <label for="exampleInputUsername1">Nama Role</label>
          <input type="text" class="form-control" name="namaRole" id="exampleInputUsername1" placeholder="Nama role">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-light" type="reset">Cancel</button>
      </form>
    </div>
  </div>
</div>

@endsection