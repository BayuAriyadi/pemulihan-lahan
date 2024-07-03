@extends('layout.main')

@section('container')
    <h1 class="h3 mb-2 text-gray-800">Daftar User</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menghasilkan tabel demo di bawah ini.
        Untuk informasi lebih lanjut tentang DataTables, silakan kunjungi <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
            <a href="{{ route('users.form') }}" class="btn btn-primary btn-sm float-right">Tambah Pengguna</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Instansi</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->Username }}</td>
                                <td>{{ $user->Institution }}</td>
                                <td>{{ $user->FullName }}</td>
                                <td>{{ $user->NIK }}</td>
                                <td>{{ $user->Role }}</td>
                                <td>
                                    <a href="{{ route('users.form', $user->UserID) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->UserID) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
