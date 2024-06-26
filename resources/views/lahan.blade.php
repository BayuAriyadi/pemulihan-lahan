@extends('layout.main')
@section('container')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Luas Lahan</th>
                            <th>Jumlah Bibit</th>
                            <th>Jenis Bibit</th>
                            <th>Dokumentasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kabupaten A</td>
                            <td>Kecamatan B</td>
                            <td>Desa C</td>
                            <td>Alamat 123</td>
                            <td>-6.200000</td>
                            <td>106.816666</td>
                            <td>1000 m²</td>
                            <td>500</td>
                            <td>Jenis Bibit A</td>
                            <td><a href="path/to/foto.jpg" target="_blank">Lihat Foto</a></td>
                            <td><a href="path/to/location_page.html" class="btn btn-primary btn-sm" target="_blank">Lihat Lokasi</a></td>
                        </tr>
                        <tr>
                            <td>Kabupaten D</td>
                            <td>Kecamatan E</td>
                            <td>Desa F</td>
                            <td>Alamat 456</td>
                            <td>-7.250000</td>
                            <td>112.750000</td>
                            <td>1500 m²</td>
                            <td>700</td>
                            <td>Jenis Bibit B</td>
                            <td><a href="path/to/foto2.jpg" target="_blank">Lihat Foto</a></td>
                            <td><a href="path/to/location_page2.html" class="btn btn-primary btn-sm" target="_blank">Lihat Lokasi</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
