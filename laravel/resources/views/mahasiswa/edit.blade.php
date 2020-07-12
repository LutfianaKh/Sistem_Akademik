@extends('template')

@section('main')
    <div id="mahasiswa">
        <h2>Edit Data Mahasiswa</h2>

        {!! Form::model($mahasiswa, ['method' => 'PATCH', 'action' => ['MahasiswaController@update', $mahasiswa->id]]) !!} 
        @if (isset($mahasiswa))
            {!! Form::hidden('id', $mahasiswa->id) !!}
        @endif
        @if ($errors->any())
            <div class="form-group {{ $errors->has('nim')?'has-error' : 'has-succes' }}">
        @else
        <div class="form-group">
        @endif
            {!! Form::label('nim', 'NIM:', ['class'=> 'control-label'])!!}
            {!! Form::text('nim', null, ['class'=> 'form-control'])!!}
            @if ($errors->has('nim'))
                <span class="help-block">{{ $errors->first('nim') }}</span>
            @endif
        </div>
        @if ($errors->any())
        <div class="form-group {{ $errors->has('nama')?'has-error' : 'has-succes' }}">
        @else
        <div class="form-group">
        @endif
            {!! Form::label('nama', 'Nama Mahasiswa:', ['class'=> 'control-label'])!!}
            {!! Form::text('nama', null, ['class'=> 'form-control'])!!}
            @if ($errors->has('nama'))
                <span class="help-block">{{ $errors->first('nama') }}</span>
            @endif
        </div>
        @if ($errors->any())
        <div class="form-group {{ $errors->has('tanggal_lahir')?'has-error' : 'has-succes' }}">
        @else
        <div class="form-group">
        @endif
            {!! Form::label('tanggal_lahir', 'Tanggal Lahir:', ['class'=> 'control-label'])!!}
            {!! Form::date('tanggal_lahir', !empty($mahasiswa)?
            $mahasiswa->tanggal_lahir->format('Y-m-d'):null,
            ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
            @if ($errors->has('tanggal_lahir'))
                <span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
            @endif
        </div>
        @if ($errors->any())
        <div class="form-group {{ $errors->has('jenis_kelamin')?'has-error' : 'has-succes' }}">
        @else
        <div class="form-group">
        @endif
            {!! Form::label('jenis_kelamin', 'Jenis Kelamin:', ['class'=> 'control-label'])!!}
            <div class="radio">
            <label>{!! Form::radio('jenis_kelamin', 'L')!!}Laki - Laki</label>
            </div>
            <div class="radio">
            <label>{!! Form::radio('jenis_kelamin', 'P')!!}Perempuan</label>
            </div>
            @if ($errors->has('jenis_kelamin'))
                <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::submit('Update', ['class'=> 'btn btn-primary form-control'])!!}
        </div>
        {!!Form::close()!!}
    </div>
@stop

@section('footer')
    <div id="footer">
    <p>&copy; Polines 2020</p>
    </div>
@stop 