@extends('layout.main')

@section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Tabel Lahan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 flex">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Tabel Lahan</h6>
        <a class="btn btn-primary mt-2 collapse-item" href="addlahan">Tambah Data Lahan</a>
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
                        <th>Nama Lokasi</th>
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $location->provinsi }}</td>
                        <td>{{ $location->regency->name }}</td>
                        <td>{{ $location->district->name }}</td>
                        <td>{{ $location->village->name }}</td>
                        <td>{{ $location->nama_lokasi}}</td>
                        <td>{{ $location->Alamat }}</td>
                        <td>{{ $location->Latitude }}</td>
                        <td>{{ $location->Longitude }}</td>
                        <td>{{ $location->LuasLahan }}</td>
                        <td>{{ $location->JumlahBibit }}</td>
                        <td>{{ $location->BibitID }}</td>
                        <td>
                            @if($location->Dokumentasi)
                            <img class="thumbnail img-fluid" src="{{ asset('storage/'.$location->Dokumentasi) }}" alt="Dokumentasi">
                            @else
                            No Image
                            @endif
                        </td>
                        <td>
                            @if($location->KMLFile)
                            <button class="btn btn-primary" data-toggle="modal" data-target="#kmlModal" data-kml="{{ asset('storage/'.$location->KMLFile) }}" data-lat="{{ $location->Latitude }}" data-lng="{{ $location->Longitude }}">Lihat Peta</button>
                            @else
                            No File
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('location.destroy', $location->LocationID) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('lahan.edit', $location->LocationID) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick=" return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for KML -->
<div class="modal fade" id="kmlModal" tabindex="-1" role="dialog" aria-labelledby="kmlModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kmlModalLabel">Peta KML</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="map" style="height: 500px;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Leaflet-omnivore JS -->
<script src="https://unpkg.com/leaflet-omnivore/leaflet-omnivore.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const thumbnails = document.querySelectorAll('.thumbnail');
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', () => {
                if (thumbnail.classList.contains('large')) {
                    thumbnail.classList.remove('large');
                } else {
                    thumbnails.forEach(thumb => thumb.classList.remove('large'));
                    thumbnail.classList.add('large');
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        let kmlMap;

        $('#kmlModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button yang memicu modal
            var kmlUrl = button.data('kml'); // Ambil URL KML dari data-kml pada button
            var lat = button.data('lat');
            var lng = button.data('lng');
            var modal = $(this);

            setTimeout(function() {
                // Hapus instance peta sebelumnya jika ada
                if (kmlMap) {
                    kmlMap.remove();
                }

                // Inisialisasi peta
                kmlMap = L.map('map').setView([lat, lng], 10);

                // Tambahkan layer tile dari OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(kmlMap);

                // Muat dan tambahkan layer KML ke peta menggunakan Leaflet-omnivore
                omnivore.kml(kmlUrl)
                    .on('ready', function() {
                        kmlMap.fitBounds(this.getBounds());
                    })
                    .on('error', function(e) {
                        console.error('Error loading KML:', e);
                    })
                    .addTo(kmlMap);
            }, 500); // Tambahkan penundaan untuk memastikan modal telah ditampilkan dengan benar
        });

        $('#kmlModal').on('hidden.bs.modal', function () {
            // Bersihkan peta saat modal ditutup
            if (kmlMap) {
                kmlMap.remove();
                kmlMap = null;
            }
        });
    });
</script>
@endsection