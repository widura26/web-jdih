@extends('template._layouts')

@section('title', 'Data Admin')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0">User Dashboard</h4>
                </div>
                <div>
                    @can('create-admin')    
                        <a class="btn btn-primary btn-icon-text btn-rounded" href="{{ route('registerView') }}">
                        <i class="ti-clipboard btn-icon-prepend"></i>Tambah Admin</a>
                    @endcan
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
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->no_telp }}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('editAdmin', $user->id) }}"> <i class="ti-pencil"></i></a>
                            <a class="btn btn-danger btn-xs" href="{{ route('deleteAdmin', $user->id) }}"><i class="ti-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
