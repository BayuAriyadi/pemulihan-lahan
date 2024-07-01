@extends('layout.main')
@section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Lokasi Pemulihan Lahan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Lokasi Pemulihan Lahan</h6>
        <a href="{{ route('land_recovery_locations.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Alamat</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Luas Lahan</th>
                        <th>Jumlah Bibit</th>
                        <th>Jenis Bibit</th>
                        <th>Foto</th>
                        <th>File KML</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                        <tr>
                            <td>{{ $location->id }}</td>
                            <td>{{ $location->provinsi }}</td>
                            <td>{{ $location->kabupaten }}</td>
                            <td>{{ $location->kecamatan }}</td>
                            <td>{{ $location->desa }}</td>
                            <td>{{ $location->alamat }}</td>
                            <td>{{ $location->latitude }}</td>
                            <td>{{ $location->longitude }}</td>
                            <td>{{ $location->luas_lahan }}</td>
                            <td>{{ $location->jumlah_bibit }}</td>
                            <td>{{ $location->jenis_bibit }}</td>
                            <td><img src="{{ asset('images/' . $location->foto) }}" alt="{{ $location->foto }}" width="100"></td>
                            <td><a href="{{ asset('kml/' . $location->file_kml) }}" download>{{ $location->file_kml }}</a></td>
                            <td>
                                <a href="{{ route('land_recovery_locations.edit', $location->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('land_recovery_locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
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
