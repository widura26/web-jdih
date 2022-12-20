@extends('template._layouts')

@section('title', 'Role Access')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0">User Dashboard</h4>
                </div>
                <div>
                    <a class="btn btn-primary btn-icon-text btn-rounded" href="{{ route('roleAdd') }}">
                        <i class="ti-clipboard btn-icon-prepend"></i>Tambah Role</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table" id="myTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('roleUpdate', $role->id)  }}"> <i class="ti-pencil"></i></a>
                            <a class="btn btn-success btn-xs" href="{{ route('viewPermission', $role->id) }}"><i class="ti-key"></i></a>
                            <a class="btn btn-danger btn-xs" href="{{ route('roleDelete', $role->id) }}"><i class="ti-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
