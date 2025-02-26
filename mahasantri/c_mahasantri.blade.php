@extends('adminlte::page')
@section('tittle','Form mahasantri')

@section('content_header')
    <h1>Form Mahasantri</h1>
    <br/>
    <a href="{{ route('mahasantri.index') }}" class="btn btn-danger btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
    
@stop 

@section('content')
@if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @php 
        $rs1 = App\Models\Jurusan::all();
        $rs2 = App\Models\Matakuliah::all();
        $rs3 = App\Models\Dosen::all();
    @endphp
    <form action="{{ route('mahasantri.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" class="form-control"/>
        </div>
        <div class="form-group">
            <label>NIM</label><input type="text" name="nim" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan_id" class="form-control">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($rs1 as $jur)
                    <option value="{{ $jur->id }}">{{ $jur->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Matakuliah</label>
            <select name="matakuliah_id" class="form-control">
                <option value="">-- Pilih Matakuliah --</option>
                @foreach($rs2 as $mat)
                    <option value="{{ $mat->id }}">{{ $mat->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Dosen Pengajar</label>
            <select name="dosen_id" class="form-control">
                <option value="">-- Pilih Dosen --</option>
                @foreach($rs3 as $dos)
                    <option value="{{ $dos->id }}">{{ $dos->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 

@section('js')
    <script>console.log('Hi!');</script>
@stop 