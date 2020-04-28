@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-tittle">Masakan</h3>
		</div>
		<div class="box box-body">
			<a href="{{URL::to('masakan/create')}}" class="btn btn-primary">Tambah Masakan</a><br></br>
			<div class="table table-responsive">
				<table id="masakan" class="table table-striped,table-condensed">
					<thead>					
						<tr>
							<th>Id Masakan</th>
							<th>Nama Masakan</th>
							<th>Foto</th>
							<th>Harga (RP)</th>
							<th>Status Masakan</th>
							<th>Aksi</th>
							<th>Hapus</th>
						</tr>
						</thead>
					<tbody>
						@foreach($masakan as $data)
						<tr>
							<td>{{$data->id}}</td>
							<td>{{$data->nama_masakan}}</td>
							<td><img src="{{asset('/upload/'.$data->foto)}}" height="50" width="70"></td>
							<td><strong>Rp.{{$data->harga}} </strong></td>
							<td>@if($data->status_masakan === 'Tersedia')<label class="label label-success">{{$data->status_masakan}}</label>
								@endif
								@if($data->status_masakan === 'Habis')
								<label class="label label-danger">{{$data->status_masakan}}</label>@endif
							</td>
							<td>
								<a href="{{url('masakan/edit/'.$data->id)}}"   class="btn btn-warning">Edit</a>
							</td>
							<td>
								<form action="{{url('masakan/hapus/'.$data->id)}}" method="post">
									{{csrf_field()}}
									<input type="hidden" name="_method" value="DELETE">
									<input type="submit" value="hapus" onclick="return myFunction();" class="btn btn-danger">
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
                $("#masakan").dataTable();
            });
        </script>
        <script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>
@endsection