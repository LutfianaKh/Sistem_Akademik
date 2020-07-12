@extends('template')

@section('main')
<div id="mahasiswa">
    <h2>Data mahasiswa</h2>
    <table class="table table-striped">
        <tr>
            <th>NIM</th>
            <td>{{ $mahasiswa -> nim }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $mahasiswa -> nama }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $mahasiswa -> tanggal_lahir->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $mahasiswa -> jenis_kelamin }}</td>
        </tr>
    </table>
 </div>

@stop

@section('footer')
    <div id="footer">
        <p>&copy; Polines 2020</p>
    </div>
@stop