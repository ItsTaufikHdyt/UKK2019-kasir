@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-tittle">User</h3>
		</div>
		<div class="box box-body">
			<a href="{{URL::to('user/create')}}" class="btn btn-primary">Tambah User</a><br></br>
			<div class="table table-responsive">
				<table id="user" class="table table-striped,table-condensed">
					<thead>					
						<tr>
							<th>Id User</th>
							<th>Username</th>
							<th>Email</th>
							<th>Nama User</th>
							<th>Level</th>
							<th>Aksi</th>
							<th>Hapus</th>
						</tr>
						</thead>
					<tbody>
						@foreach($users as $data)
						<tr>
							<td>{{$data->id}}</td>
							<td>{{$data->username}}</td>
							<td>{{$data->email}}</td>
							<td>{{$data->nama_user}}</td>
							<td>{{$data->id_level}}</td>
							<td>
								<a href="{{url('user/edit/'.$data->id)}}" class="btn btn-warning">Edit</a>
							</td>
							<td>
								<form action="{{url('user/hapus/'.$data->id)}}" method="post">
									{{csrf_field()}}
									<input type="hidden" name="_method" value="DELETE">
									<input type="submit" value="hapus" class="btn btn-danger">
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('custom_script')
  <script type="text/javascript">
            $(function() {
                $("#user").dataTable();
            });
        </script>
@endsection