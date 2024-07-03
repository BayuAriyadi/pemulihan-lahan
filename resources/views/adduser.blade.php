@extends('layout.main')

@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($user) ? 'Edit Pengguna' : 'Tambah Pengguna' }}</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">{{ isset($user) ? 'Form Edit Pengguna' : 'Form Tambah Pengguna' }}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ isset($user) ? route('users.save', $user->UserID) : route('users.save') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ isset($user) ? $user->Username : '' }}" placeholder="Masukkan Username" required>
                </div>
                @if (!isset($user))
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                @endif
                <div class="form-group">
                    <label for="full_name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ isset($user) ? $user->FullName : '' }}" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ isset($user) ? $user->NIK : '' }}" placeholder="Masukkan NIK" required>
                </div>
                <div class="form-group">
                    <label for="institution">Instansi</label>
                    <input type="text" class="form-control" id="institution" name="institution" value="{{ isset($user) ? $user->Institution : '' }}" placeholder="Masukkan Instansi" required>
                </div>
                <div class="form-group">
                    <label for="role">Peran</label>
                    <select id="role" class="form-control" name="role" required>
                        <option value="user" {{ isset($user) && $user->Role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ isset($user) && $user->Role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="super admin" {{ isset($user) && $user->Role == 'super admin' ? 'selected' : '' }}>Super Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">{{ isset($user) ? 'Update' : 'Tambah' }}</button>
            </form>
        </div>
    </div>
@endsection
