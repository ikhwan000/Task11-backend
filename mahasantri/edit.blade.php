@extends('adminlte::page')
@section('tittle','Detail Mahasantri')

@section('content_header')
    <h1>Detail Mahasantri</h1>
    <br/>
    <a href="{{ route('mahasantri.index') }}" class="btn btn-danger btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
    
@stop 

@section('content')

    @php 
        $rs1 = App\Models\Jurusan::all();
        $rs2 = App\Models\Matakuliah::all();
        $rs3 = App\Models\Dosen::all();
    @endphp
    @foreach($data as $d)
    <form action="{{ route('mahasantri.update',$mhs->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" value="{{ $mhs->nama }}"  class="form-control"/>
        </div>
        <div class="form-group">
            <label>NIM</label><input type="text" name="nim" value="{{ $mhs->nim }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan_id" class="form-control">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($rs1 as $jur)
                    @php
                        $sel1 = ($jur->id == $mhs->jurusanid) ? 'selected' : '';  
                    @endphp
                    <option value="{{ $jur->id }}" {{ $sel1 }}>{{ $jur->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Matakuliah</label>
            <select name="matakuliah_id" class="form-control">
                <option value="">-- Pilih Matakuliah --</option>
                @foreach($rs2 as $mat)
                    @php
                        $sel2 = ($mat->id == $mhs->matakuliahid) ? 'selected' : '';  
                    @endphp     
                    <option value="{{ $mat->id }}" {{ $sel2 }}>{{ $mat->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Dosen Pengajar</label>
            <select name="dosen_id" class="form-control">
                <option value="">-- Pilih Dosen Pengajar --</option>
                @foreach($rs3 as $dos)
                    @php
                        $sel3 = ($dos->id == $mhs->dosenid) ? 'selected' : '';  
                    @endphp
                    <option value="{{ $dos->id }}" {{ $sel3 }}>{{ $dos->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @endforeach
@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 

@section('js')
    <script>console.log('Hi!');</script>
@stop 