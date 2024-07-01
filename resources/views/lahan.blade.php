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
                        <th>No</th>
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
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                    <tr>
                        <td>{{ ++$i }}</td>
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
                        <td><img src="/images/{{ $location->foto }}" width="100px"></td>
                        <td><a href="/kml/{{ $location->file_kml }}" target="_blank">View KML</a></td>
                        <td>
                            <form action="{{ route('land_recovery_locations.create',$location->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('land_recovery_locations.show',$location->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('land_recovery_locations.edit',$location->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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