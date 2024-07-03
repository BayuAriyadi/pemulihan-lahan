@extends('layout.main')

@section('title', isset($location) ? 'Edit Data Lahan' : 'Tambah Data Lahan')

@section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ isset($location) ? 'Edit Data Pemulihan Lahan' : 'Tambah Data Pemulihan Lahan' }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ isset($location) ? 'Edit Data Pemulihan Lahan' : 'Tambah Data Pemulihan Lahan' }}</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ isset($location) ? route('lahan.update', $location->LocationID) : route('lahan.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($location))
            @method('PUT')
            @endif
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
                <div class="col-md-9">
                    <input class="form-control" name="provinsi" id="provinsi" value="{{ old('provinsi', isset($location) ? $location->provinsi : $provinces->first()->name) }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="kabupaten">Kabupaten / Kota</label>
                <div class="col-md-9">
                    <select class="form-control" name="kabupaten" id="kabupaten" required>
                        <option value="">Pilih Salah Kota..</option>
                        @foreach($regencies as $kabupaten)
                        <option value="{{ $kabupaten->id }}" {{ (isset($location) && $location->kabupaten == $kabupaten->id) ? 'selected' : '' }}>{{ $kabupaten->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
                <div class="col-md-9">
                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                        <option value="">Pilih Salah Kecamatan..</option>
                        @if(isset($location))
                        <option value="{{ $location->kecamatan }}" selected>{{ $location->district->name }}</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="desa">Desa</label>
                <div class="col-md-9">
                    <select class="form-control" name="desa" id="desa" required>
                        <option value="">Pilih Desa..</option>
                        @if(isset($location))
                        <option value="{{ $location->desa }}" selected>{{ $location->village->name }}</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" value="{{ isset($location) ? $location->nama_lokasi : '' }}" required>
            </div>
            <div class="form-group">
                <label for="inputAlamat">Alamat</label>
                <input type="text" class="form-control" name="Alamat" id="inputAlamat" placeholder="Masukkan alamat lahan" value="{{ old('Alamat', $location->Alamat ?? '') }}" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputLatitude">Latitude</label>
                    <input type="text" class="form-control" name="Latitude" id="inputLatitude" placeholder="Masukkan Latitude" value="{{ old('Latitude', $location->Latitude ?? '') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLongitude">Longitude</label>
                    <input type="text" class="form-control" name="Longitude" id="inputLongitude" placeholder="Masukkan Longitude" value="{{ old('Longitude', $location->Longitude ?? '') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputLuasLahan">Luas Lahan</label>
                    <input type="text" class="form-control" name="LuasLahan" id="inputLuasLahan" placeholder="Masukkan Luas Lahan" value="{{ old('LuasLahan', $location->LuasLahan ?? '') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputJumlahBibit">Jumlah Bibit</label>
                    <input type="text" class="form-control" name="JumlahBibit" id="inputJumlahBibit" placeholder="Masukkan Jumlah Bibit" value="{{ old('JumlahBibit', $location->JumlahBibit ?? '') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputJenisBibit">Jenis Bibit</label>
                    <input type="text" class="form-control" name="JenisBibit" id="inputJenisBibit" placeholder="Masukkan Jenis Bibit" value="{{ old('JenisBibit', $location->JenisBibit ?? '') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFoto">Dokumentasi (Foto)</label>
                <div class="custom-file">
                    <input name="inputFoto" type="file" class="custom-file-input" id="inputFoto" accept="image/*" {{ isset($location) ? '' : 'required' }}>
                    <label class="custom-file-label" for="inputFoto">{{ isset($location) ? 'Ganti foto' : 'Pilih file foto' }}</label>
                </div>
                @if(isset($location) && $location->Dokumentasi)
                <img src="{{ asset('storage/'.$location->Dokumentasi) }}" width="100" alt="Dokumentasi">
                @endif
            </div>
            <div class="form-group">
                <label for="inputFileKML">File Koordinat (.kml dari Google Earth)</label>
                <div class="custom-file">
                    <input name="inputFileKML" type="file" class="custom-file-input" id="inputFileKML" accept=".kml" {{ isset($location) ? '' : 'required' }}>
                    <label class="custom-file-label" for="inputFileKML">{{ isset($location) ? 'Ganti file .kml' : 'Pilih file .kml' }}</label>
                </div>
                @if(isset($location) && $location->KMLFile)
                <a href="{{ asset('storage/'.$location->KMLFile) }}" target="_blank">Lihat File KML</a>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mr-3">{{ isset($location) ? 'Update' : 'Submit' }}</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </div>
</div>

<!-- Script to display the file name in the custom file input -->
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#kabupaten').on('change', function() {
            let id_kabupaten = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{ route('getkecamatan') }}",
                data: {
                    id_kabupaten: id_kabupaten
                },
                cache: false,
                success: function(response) {
                    $('#kecamatan').html(response.options);
                },
                error: function(data) {
                    console.log('error', data);
                }
            });
        });

        $('#kecamatan').on('change', function() {
            let id_kecamatan = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{ route('getdesa') }}",
                data: {
                    id_kecamatan: id_kecamatan
                },
                cache: false,
                success: function(response) {
                    $('#desa').html(response.options);
                },
                error: function(data) {
                    console.log('error', data);
                }
            });
        });

        document.querySelectorAll('.custom-file-input').forEach(function(input) {
            input.addEventListener('change', function(e) {
                var fileName = e.target.files[0].name;
                var nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = fileName;
            });
        });
    });
</script>
@endsection