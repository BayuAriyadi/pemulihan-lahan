@extends('layout.main')
@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Lahan</h1>

    <!-- DataTales Example -->
    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pemulihan Lahan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kabupaten / Kota</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Alamat</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Luas Lahan</th>
                        <th>Jumlah Bibit</th>
                        <th>Jenis Bibit</th>
                        <th>Dokumentasi (Foto)</th>
                        <th>File Koordinat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Isi tabel dinamis disini -->
                    <tr>
                        <td>Kabupaten A</td>
                        <td>Kecamatan A</td>
                        <td>Desa A</td>
                        <td>Jalan ABC No. 123</td>
                        <td>-7.12345</td>
                        <td>110.56789</td>
                        <td>1000 m²</td>
                        <td>500</td>
                        <td>Jenis A</td>
                        <td><a href="#">View Foto</a></td>
                        <td><a href="#">Download KML</a></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script untuk meng-handle aksi edit dan hapus -->
<script>
    // Aksi edit
    document.querySelectorAll('.btn.btn-sm.btn-primary').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            // Logika untuk mengambil data dari baris yang sesuai dan mengarahkan ke halaman edit
            console.log('Edit clicked');
        });
    });

    // Aksi hapus
    document.querySelectorAll('.btn.btn-sm.btn-danger').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            // Logika untuk mengambil data dari baris yang sesuai dan melakukan konfirmasi/hapus data
            console.log('Hapus clicked');
        });
    });
</script>

    

@endsection
