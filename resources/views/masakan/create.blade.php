@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
	<div class="box box-info">
		<div class="box-header with-border">
		<h3 >Tambah User</h3>	
		</div>
		<div class="box box-body">
			<form action="{{url('masakan/store')}}" method="post" class="form-group" enctype="multipart/form-data">
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
					<label for="id" class="col-md-4 control-label"> Id Masakan</label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control" name="id" readonly="true" placeholder="Otomatis">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="nama_masakan" class="col-md-4 control-label"> Nama Masakan </label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control" name="nama_masakan"  placeholder="Nama Masakan">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="foto" class="col-md-4 control-label"> Foto </label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="file" class="form-control" name="foto"  >
							<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="nama_user" class="col-md-4 control-label"> Harga </label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control" name="harga"  placeholder="Harga">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="status_masakan" class="col-md-4 control-label"> Status Masakan </label>
					<div class="col-md-6">
						<select id="" class="form-control" name="status_masakan">
							<option value="Tersedia">Tersedia</option>
							<option value="Habis">Tidak Tersedia</option>
				
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