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
      <form class="forms-sample" method="post" action="{{ route('roleEdit', $editRole->id) }}">
        @csrf
        <div class="form-group">
          <label for="exampleInputUsername1">Nama Role</label>
          <input type="text" class="form-control" name="namaRole" id="exampleInputUsername1" placeholder="Nama role" value="{{ $editRole->name }}">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-light" href="{{ route('roleView') }}" type="reset">Cancel</a>
      </form>
    </div>
  </div>
</div>

@endsection