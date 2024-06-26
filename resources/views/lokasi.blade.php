@extends('layout.main')
@section('container')
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pemulihan Lahan</h6>
    </div>
    <div class="card-body">
        <form id="form-wilayah">
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="kabupaten">Kabupaten / Kota</label>
                <div class="col-md-9 input-group">
                    <select class="form-control" name="kabupaten" id="kabupaten" required>
                        <option value="">Pilih Data Lahan</option>
                        <!-- List of options dynamically populated -->
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

<script type="text/javascript">
    // Initialize the map
    var L = window.L;
    const map = new L.Map('map').setView([0, 0], 2);

    // Add OpenStreetMap tiles
    const osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(osm);

    // Load KML file
    fetch('assets/lingkunganhidup.kml')
        .then(res => res.text())
        .then(kmltext => {
            // Create a new KML overlay
            const parser = new DOMParser();
            const kml = parser.parseFromString(kmltext, 'text/xml');
            const track = new L.KML(kml);
            map.addLayer(track);

            // Adjust map to show the KML
            const bounds = track.getBounds();
            map.fitBounds(bounds);
        })
        .catch(error => console.error('Error loading KML file:', error));
</script>

@endsection
