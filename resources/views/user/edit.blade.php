@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
	<div class="box box-info">
		<div class="box-header with-border">
		<h3 >Edit User</h3>	
		</div>
		<div class="box box-body">
			<form action="{{url('user/update/'.$users->id)}}" method="post" class="form-group">
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
					<label for="id" class="col-md-4 control-label"> Id User</label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control" name="id" value="{{$users->id}}" readonly="true" >
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="username" class="col-md-4 control-label"> Username </label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control" name="username" value="{{$users->username}}" >
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-md-4 control-label"> Email </label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control" name="email" value="{{$users->email}}"  >
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="nama_user" class="col-md-4 control-label"> Nama User </label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control" name="nama_user" value="{{$users->nama_user}}" >
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="id_level" class="col-md-4 control-label"> Level </label>
					<div class="col-md-6">
						<select id="" class="form-control" name="id_level">
							<option value="">
								----------- level-------------
							</option>
							@foreach($level as $data)
							<option value="{{$data->id}}" @if($data->id===$users->id_level)selected @endif>
								{{$data->nama_level}}
							</option>
							@endforeach
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