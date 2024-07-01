@extends('layout.main')
@section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Lokasi Pemulihan Lahan</h1>

<!-- Form Edit Data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Pemulihan Lahan</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('land_recovery_locations.update', $location->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
                <div class="col-md-9">
                    <select class="form-control" name="provinsi_id" id="provinsi" required>
                        @foreach($provinces as $provinsi)
                        <option value="{{ $provinsi->id }}" {{ $location->provinsi_id == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="kabupaten">Kabupaten / Kota</label>
                <div class="col-md-9">
                    <select class="form-control" name="kabupaten_id" id="kabupaten" required>
                        <option value="">Pilih Kabupaten/Kota</option>
                        @foreach($regencies as $kabupaten)
                        <option value="{{ $kabupaten->id }}" {{ $location->kabupaten_id == $kabupaten->id ? 'selected' : '' }}>{{ $kabupaten->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
                <div class="col-md-9">
                    <select class="form-control" name="kecamatan_id" id="kecamatan" required>
                        <option value="">Pilih Kecamatan</option>
                        @foreach($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}" {{ $location->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="desa">Desa</label>
                <div class="col-md-9">
                    <select class="form-control" name="desa_id" id="desa" required>
                        <option value="">Pilih Desa</option>
                        @foreach($desas as $desa)
                        <option value="{{ $desa->id }}" {{ $location->desa_id == $desa->id ? 'selected' : '' }}>{{ $desa->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $location->alamat }}" placeholder="Masukkan alamat lahan" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $location->latitude }}" placeholder="Masukkan Latitude" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $location->longitude }}" placeholder="Masukkan Longitude" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="luas_lahan">Luas Lahan</label>
                    <input type="text" class="form-control" name="luas_lahan" id="luas_lahan" value="{{ $location->luas_lahan }}" placeholder="Masukkan Luas Lahan" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="jumlah_bibit">Jumlah Bibit</label>
                    <input type="text" class="form-control" name="jumlah_bibit" id="jumlah_bibit" value="{{ $location->jumlah_bibit }}" placeholder="Masukkan Jumlah Bibit" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="jenis_bibit">Jenis Bibit</label>
                    <input type="text" class="form-control" name="jenis_bibit" id="jenis_bibit" value="{{ $location->jenis_bibit }}" placeholder="Masukkan Jenis Bibit" required>
                </div>
            </div>
            <div class="form-group">
                <label for="foto">Dokumentasi (Foto)</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto" id="foto" accept="image/*">
                    <label class="custom-file-label" for="foto">Pilih file foto</label>
                </div>
            </div>
            <div class="form-group">
                <label for="file_kml">File Koordinat (.kml dari Google Earth)</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_kml" id="file_kml" accept=".kml">
                    <label class="custom-file-label" for="file_kml">Pilih file .kml</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mr-3">Update</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>
</div>

<!-- Script to dynamically populate dropdowns -->
<script>
    $(document).ready(function() {
        $('#provinsi').on('change', function() {
            let provinsiID = $(this).val();
            if(provinsiID) {
                $.ajax({
                    url: '/getkabupaten/'+provinsiID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#kabupaten').empty();
                        $('#kabupaten').append('<option value="">Pilih Kabupaten/Kota</option>');
                        $.each(data, function(key, value) {
                            $('#kabupaten').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#kabupaten').empty();
            }
        });

        $('#kabupaten').on('change', function() {
            let kabupatenID = $(this).val();
            if(kabupatenID) {
                $.ajax({
                    url: '/getkecamatan/'+kabupatenID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#kecamatan').empty();
                        $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                            $('#kecamatan').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#kecamatan').empty();
            }
        });

        $('#kecamatan').on('change', function() {
            let kecamatanID = $(this).val();
            if(kecamatanID) {
                $.ajax({
                    url: '/getdesa/'+kecamatanID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#desa').empty();
                        $('#desa').append('<option value="">Pilih Desa</option>');
                        $.each(data, function(key, value) {
                            $('#desa').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#desa').empty();
            }
        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>

@endsection
