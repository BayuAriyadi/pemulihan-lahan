@extends('layout.main')
@section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Lahan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pemulihan Lahan</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
                <div class="col-md-9">
                    <!-- @foreach($provinces as $provinsi)
                    <input class="form-control " name="provinsi" id="provinsi" placeholder="{{$provinsi->name}}" readonly>
                    @endforeach

                    </input> -->
                    <select class="form-control" name="provinsi" id="provinsi" required>
                        <option>Pilih Provinsi</option>
                        @foreach($provinces as $provinsi)
                        <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="kabupaten">Kabupaten / Kota</label>
                <div class="col-md-9">
                    <select class="form-control" name="kabupaten" id="kabupaten" required>
                        <option>Pilih Salah Kota..</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
                <div class="col-md-9">
                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                        <option>Pilih Salah Kecamatan..</option>
                        <!-- List of options dynamically populated based on selected kabupaten -->

                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-3 col-form-label" for="desa">Desa</label>
                <div class="col-md-9">
                    <select class="form-control" name="desa" id="desa" required>
                        <option>Pilih Desa..</option>
                        <!-- List of options dynamically populated based on selected kecamatan -->

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAlamat">Alamat</label>
                <input type="text" class="form-control" id="inputAlamat" placeholder="Masukkan alamat lahan" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputLatitude">Latitude</label>
                    <input type="text" class="form-control" id="inputLatitude" placeholder="Masukkan Latitude" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLongitude">Longitude</label>
                    <input type="text" class="form-control" id="inputLongitude" placeholder="Masukkan Longitude" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputLuasLahan">Luas Lahan</label>
                    <input type="text" class="form-control" id="inputLuasLahan" placeholder="Masukkan Luas Lahan" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputJumlahBibit">Jumlah Bibit</label>
                    <input type="text" class="form-control" id="inputJumlahBibit" placeholder="Masukkan Jumlah Bibit" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputJenisBibit">Jenis Bibit</label>
                    <input type="text" class="form-control" id="inputJenisBibit" placeholder="Masukkan Jenis Bibit" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFoto">Dokumentasi (Foto)</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputFoto" accept="image/*" required>
                    <label class="custom-file-label" for="inputFoto">Pilih file foto</label>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFileKML">File Koordinat (.kml dari Google Earth)</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputFileKML" accept=".kml" required>
                    <label class="custom-file-label" for="inputFileKML">Pilih file .kml</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mr-3">Submit</button>
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
        })
        $(function() {
            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();
                console.log('ini adalah id '+ id_provinsi);

                $.ajax({
                    type: 'POST',
                    url: "{{route('getkabupaten')}}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    cache: false,

                    sucess: function(msg) {
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error', data);
                    }
                })
            })
        })
    })

    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("inputFoto").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    });

    document.querySelector('#inputFileKML').addEventListener('change', function(e) {
        var fileName = document.getElementById("inputFileKML").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    });
</script>


@endsection