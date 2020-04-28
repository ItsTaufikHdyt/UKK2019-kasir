@extends('adminlte::layouts.app')
@section('contentheader_title', 'Meja')
@section('main-content')
<div class="container container-fluid spark-screen">
    <div class="row">
        <div class="box box-default" style="box-shadow: 2px 2px 5px;">
            <div class="box box-body">
                <label class="label label-success">Meja Masih Tersedia</label>
                <label class="label label-danger">Meja Sedang Digunakan</label>
             <div style= "overflow-y: auto; height:250px;">
            @foreach($meja as $data)
                @if($data->status_meja==='Kosong')
                 <a href="{{url('meja/edit/'.$data->no_meja)}}" style="margin:5px;font-size:30px;width:90px" class="btn btn-success">{{$data->no_meja}}</a>
                </form>
                @elseif($data->status_meja==='Penuh')
                <a href="{{url('meja/edit/'.$data->no_meja)}}" style="margin:5px;font-size:30px;width:90px" class="btn btn-danger">{{$data->no_meja}}</a>
                @endif

                {{-- <a href="{{url('meja/edit/'.$data->no_meja)}}" style="margin:5px;font-size:30px;width:90px" class="btn btn-warning">Edit Meja</a> --}}
            @endforeach
            <br><br><br><br><br>
            <a href="{{URL::to('meja/create')}}" class="btn btn-primary">Tambah Meja</a>
             </div>
            </div>
        </div>
    </div>
</div>
@endsection