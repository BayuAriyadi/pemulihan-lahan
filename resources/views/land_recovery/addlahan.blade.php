@extends('layout.main')
@section('container')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Lahan</h1>

<!-- DataTales Example -->
<div class="row mb-3">
    <label class="col-md-3 col-form-label" for="UserID">User</label>
    <div class="col-md-9">
        <select class="form-control" name="UserID" id="UserID" required>
            <option value="">Pilih User..</option>
            @foreach($users as $user)
            <option value="{{$user->UserID}}" {{ (old('UserID', $location->UserID ?? '') == $user->UserID) ? 'selected' : '' }}>{{$user->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mb-3">
    <label class="col-md-3 col-form-label" for="DesaID">Desa</label>
    <div class="col-md-9">
        <select class="form-control" name="DesaID" id="DesaID" required>
            <option value="">Pilih Desa..</option>
            @foreach($desas as $desa)
            <option value="{{$desa->id}}" {{ (old('DesaID', $location->DesaID ?? '') == $desa->id) ? 'selected' : '' }}>{{$desa->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<!-- Include other fields here -->
<div class="row mb-3">
    <label class="col-md-3 col-form-label" for="BibitID">Jenis Bibit</label>
    <div class="col-md-9">
        <select class="form-control" name="BibitID" id="BibitID" required>
            <option value="">Pilih Jenis Bibit..</option>
            @foreach($bibits as $bibit)
            <option value="{{$bibit->BibitID}}" {{ (old('BibitID', $location->BibitID ?? '') == $bibit->BibitID) ? 'selected' : '' }}>{{$bibit->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<!-- Include other fields and file uploads here -->


<!-- Script to display the file name in the custom file input -->
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $(function() {
            // $('#kabupaten').on('change', function() {

            //     let id_kabupaten = $('#kabupaten').val();
            //     console.log('ini adalah id '+ id_kabupaten);

            //     $.ajax({
            //         type: 'POST',
            //         url: "{{route('getkecamatan')}}",
            //         data: {id_kabupaten:id_kabupaten},
            //         cache: false,

            //         sucess: console.log(

            //         ) ,function(msg) {
            //             $('#kecamatan').html(msg);
            //         },
            //         error: function(data) {
            //             console.log('error', data);
            //         }
            //     })
            // })

            $('#kabupaten').on('change', function() {
                let id_kabupaten = $(this).val();
                console.log('ini adalah id ' + id_kabupaten);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kabupaten: id_kabupaten
                    },
                    cache: false,
                    success: function(response) {
                        console.log('sukses', response);
                        $('#kecamatan').html(response.options);
                    },
                    error: function(data) {
                        console.log('error', data);
                    }
                });
            });

            $('#kecamatan').on('change', function() {
                let id_kecamatan = $(this).val();
                console.log('ini adalah id ' + id_kecamatan);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getdesa') }}",
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    cache: false,
                    success: function(response) {
                        console.log('sukses', response);
                        $('#desa').html(response.options);
                    },
                    error: function(data) {
                        console.log('error', data);
                    }
                });
            });
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