@extends('adminlte::page')
@section('tittle','Data Mahasantri')

@section('content_header')
    <h1><i class="fa fa-graduation-cap" aria-hidden="true"> Data Mahasantri</i></h1>
@stop 

@section('content')
    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    @endif

    @php 
        $ar_judul = ['No','Nama','NIM','Jurusan','Matakuliah','Dosen Pengajar'];
        $no = 1;
    @endphp
    <a href="{{ route('mahasantri.create') }}" class="btn btn-primary btn-md" role="button"> <i class="fa fa-plus"></i> Tambah Mahasantri</a><br/><br/>
    <div class="card">
    <div class="card-body">  
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($ar_mahasantri as $mhs)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->jur }}</td>
                    <td>{{ $mhs->mat }}</td>
                    <td>{{ $mhs->dos }}</td>
                    <td>
                    <form action="{{ route('mahasantri.destroy',$mhs->id) }}" method="POST">
                            @csrf 
                            @method('delete')
                            <a href="{{ route('mahasantri.show',$mhs->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('mahasantri.edit',$mhs->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 
@section('js')
    <script>console.log('Hi!');</script>
@stop 