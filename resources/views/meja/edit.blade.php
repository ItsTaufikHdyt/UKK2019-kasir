@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
    <div class="box box-info">
        <div class="box-header with-border">
        <h3 >Tambah User</h3>   
        </div>
        <div class="box box-body">
            <form action="{{url('meja/update'.$meja->no_meja)}}" method="post" class="form-horizontal">
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}

                @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                
                <div class="form-group">
                    <label for="id" class="col-md-4 control-label control-label"> No Meja</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="number" class="form-control" value="{{$meja->no_meja}}" name="no_meja"  placeholder="Otomatis">
                            <span class="input-group-addon"><i class="fa fa-number"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status_meja" class="col-md-4 control-label"> Status Meja </label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <select name="status_meja" class="form-control">
                                <option value="Kosong">Kosong</option>
                                <option value="Penuh">Penuh</option>
                            </select>
                            <span class="input-group-addon"><i class="fa fa-check"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection