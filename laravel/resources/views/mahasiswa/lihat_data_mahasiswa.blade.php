@extends('template')

@section('main')
<div id="mahasiswa">
    <h2>Data mahasiswa</h2>
        @if(!empty($mahasiswa_list))
            <table class="table">
                <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($mahasiswa_list as $mahasiswa):?>
                    <tr>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->tanggal_lahir->format('d-m-Y') }}</td>
                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                    <td>
                    <div class="box-button">{{ link_to('mahasiswa/'.$mahasiswa->id, 'Detail', ['class' => 'btn btn-success btn-sm'])}}</div>
                    <div class="box-button">{{ link_to('mahasiswa/'.$mahasiswa->id.'/edit', 'Edit', ['class' => 'btn btn-warning btn-sm'])}}</div>
                    <div class="box-button">
                    {!! Form::open(['method' => 'DELETE', 'action' => ['MahasiswaController@destroy', $mahasiswa->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                    </div>
                    </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        @else:
    <p>Data Mahasiswa Kosong.</p>
    @endif 

    <div class="table-nav">
        <div class="jumlah-data">
            <strong>
                Jumlah Mahasiswa : {{ $jumlah_mahasiswa }}
            </strong>
        </div>
        <div class="paging">
            {{ $mahasiswa_list->links() }}
        </div>
    </div>

    <div class="tombol-nav">
        <div>
            <a href="{{ url('create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>
    </div>
</div>

@stop

@section('footer')
    <div id="footer">
        <p>&copy; Polines 2020</p>
    </div>
@stop

