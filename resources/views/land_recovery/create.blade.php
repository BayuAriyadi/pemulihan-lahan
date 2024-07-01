@extends('layout.main')
@section('container')
<h1 class="h3 mb-2 text-gray-800">Tambah Data Pemulihan Lahan</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('land_recovery_locations.create') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @include('land_recovery_locations.form')

    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-warning">Reset</button>
</form>
@endsection
