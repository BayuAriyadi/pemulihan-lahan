@extends('layout.main')
@section('container')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Akun</h1>
        <a href="/dashboard" class="btn btn-sm btn-primary"> Kembali </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">Form Tambah User</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" id="inputUsername" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary reveal" type="button"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputInstansi">Instansi</label>
                    <input type="text" class="form-control" id="inputInstansi" placeholder="Masukkan Instansi" required>
                </div>
                <div class="form-group">
                    <label for="inputNama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label for="inputNIK">NIK</label>
                    <input type="text" class="form-control" id="inputNIK" placeholder="Masukkan NIK" required>
                </div> 
                <div class="form-group">
                    <label for="inputAkses">Pilih Akses</label>
                    <select id="inputAkses" class="form-control" required>
                        <option value="" disabled selected>Pilih Akses</option>
                        <option value="Admin">Admin</option>
                        <option value="Super Admin">Super Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
        
                <button type="reset" class="btn btn-warning mr-2">Reset</button>
                <button type="submit" class="btn btn-success ">Tambah</button>
            </form>
        </div>
    </div>
@endsection
