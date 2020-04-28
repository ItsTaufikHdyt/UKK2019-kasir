@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
	<div class="box box-info">
		<div class="box-header with-border">
		<h3 >Tambah Order</h3>	
		</div>
		<div class="box box-body">
			<form action="{{url('detail_order/update/'.$detail_order->id)}}" method="post" class="form-group">
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
					<label for="id" class="col-md-4 control-label"> Id Detail Order </label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control" name="id" readonly="true" placeholder="Otomatis" value="{{$detail_order->id}}">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="id_order" class="col-md-4 control-label"> Id Order </label>
					<div class="col-md-6">
						<select id="" class="form-control" name="id_order">
							<option value="">
								--- Order ---
							</option>
							@foreach($order as $data)
							<option value="{{$data->id}}" @if($data->id === $detail_order->id_order)selected @endif>
								{{$data->id}}
							</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="id_masakan" class="col-md-4 control-label"> Id Masakan </label>
					<div class="col-md-6">
						<select id="" class="form-control" name="id_masakan">
							<option value="">
								--- Masakan ---
							</option>
							@foreach($masakan as $data)
							<option value="{{$data->id}}" @if($data->id === $detail_order->id_masakan)selected @endif>
								{{$data->nama_masakan}}
							</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="keterangan" class="col-md-4 control-label"> Keterangan </label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control" name="keterangan" value="{{$detail_order->keterangan}}">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calender"></i></span>
						</div>
					</div>
				</div>


				<div class="form-group">
					<label for="status_detail_order" class="col-md-4 control-label"> Status Detail Order </label>
					<div class="col-md-6">
						<select id="" class="form-control" name="status_detail_order">
							<option value="Siap">Siap</option>
							<option value="Belum">Belum Siap</option>
						<span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
						</select>
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