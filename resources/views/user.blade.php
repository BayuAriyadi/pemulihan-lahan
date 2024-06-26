@extends('layout.main')
@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar User</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Instansi</th>
                                <th>Nama Lengkap</th>
                                <th>NIK</th>
                                <th>Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>tiger_nixon</td>
                                <td>*******</td> <!-- Passwords are usually masked for security -->
                                <td>Company A</td>
                                <td>Tiger Nixon</td>
                                <td>1234567890</td>
                                <td>Admin</td>
                            </tr>
                            <tr>
                                <td>garrett_winters</td>
                                <td>*******</td> <!-- Passwords are usually masked for security -->
                                <td>Company B</td>
                                <td>Garrett Winters</td>
                                <td>0987654321</td>
                                <td>User</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
@endsection
