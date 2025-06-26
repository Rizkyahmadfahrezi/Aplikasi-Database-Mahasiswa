@extends('layouts/app')
@section('title', $title." ".$mahasiswa['nama'])
@section('content')
<h1>{{ $title }}</h1>

NIM : <span class="info">{{ $mahasiswa['nim'] }}</span> <br>
Nama : <span class="info">{{ $mahasiswa['nama'] }}</span> <br>
Alamat : <span class="info">{{ $mahasiswa['alamat'] }}</span> <br>
Jenis Kelamin : <span class="info">{{ $jenkel[$mahasiswa['jenkel']] }}</span> <br>
Foto : <img src="/upload/fotomahasiswa/{{ $mahasiswa['foto'] }}" width="150" height="150">
<hr>
<a href="{{ route('mahasiswa.index') }}">Kembali ke Halaman Data Mahasiswa</a>
@endsection

@push('css')
<style>
    .info{
        color: red;
        font-weight: bold;
    }
</style>
@endpush