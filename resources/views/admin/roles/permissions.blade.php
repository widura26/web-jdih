@extends('template._layouts')

@section('title', 'Role Permission')

@section('content')

    <div class="bg-light p-4 rounded">
        <h1> Hak Akses </h1>
        <div class="lead">
            Tambahkan hak akses baru.
        </div>

        <div class="container mt-4">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('inputPermission', $role->id) }}">
                @csrf
                {{-- <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>
                </div> --}}

                <label for="permissions" class="form-label">Masukan Hak Akses</label>

                <table class="table table-striped">
                    <thead>
                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th>
                    </thead>

                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" {{ $role->hasPermissionTo($permission->name) ? "checked" : "" }}
                                    name="permission[]" value="{{ $permission->name }}"
                                    class="permission">
                            </td>
                            <td>{{ $permission->label }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </table>

                <button type="submit" class="btn btn-primary">Save user</button>
                <a href="{{ route('roleView') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
