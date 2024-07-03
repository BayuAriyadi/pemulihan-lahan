@extends('layout.main')
@section('container')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pemulihan Lahan</h6>
    </div>
    <div class="card-body">
        <form id="form-wilayah">
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="location">Kabupaten / Kota</label>
                <div class="col-md-9 input-group">
                    <select class="form-control" name="location" id="location" required>
                        <option value="">Pilih Data Lahan</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->LocationID }}" data-kml="{{ asset('storage/' . $location->KMLFile) }}" data-lat="{{ $location->Latitude }}" data-lng="{{ $location->Longitude }}">{{ $location->nama_lokasi }}</option>
                        @endforeach

                    </select>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary" id="btn-cari">Cari</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="map" class="rounded-3 shadow p-3 mb-5 bg-white rounded" style="height: 500px;"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-omnivore@0.3.4/leaflet-omnivore.min.js"></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
    var L = window.L;
    var kmlMap = L.map('map').setView([0, 0], 2);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(kmlMap);

    document.getElementById('btn-cari').addEventListener('click', function () {
        const locationSelect = document.getElementById('location');
        const selectedOption = locationSelect.options[locationSelect.selectedIndex];

        if (selectedOption.value) {
            const kmlUrl = selectedOption.getAttribute('data-kml');
            const lat = parseFloat(selectedOption.getAttribute('data-lat'));
            const lng = parseFloat(selectedOption.getAttribute('data-lng'));

            console.log('Selected KML URL:', kmlUrl);
            console.log('Latitude:', lat);
            console.log('Longitude:', lng);

            // Hapus semua layer kecuali tile layer
            kmlMap.eachLayer(function (layer) {
                if (!(layer instanceof L.TileLayer)) {
                    kmlMap.removeLayer(layer);
                }
            });

            // Inisialisasi ulang peta
            kmlMap.setView([lat, lng], 10);

            // Muat dan tambahkan layer KML ke peta menggunakan Leaflet-omnivore
            omnivore.kml(kmlUrl)
                .on('ready', function() {
                    kmlMap.fitBounds(this.getBounds());
                })
                .on('error', function(e) {
                    console.error('Error loading KML:', e);
                })
                .addTo(kmlMap);
        }
    });
});
</script>
<!-- Tambahkan ini di bagian <head> atau sebelum penutup </body> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

@endsection
