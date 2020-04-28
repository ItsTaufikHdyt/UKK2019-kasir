@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-tittle">Detail Order</h3>
		</div>
		<div class="box box-body">
			<a href="{{URL::to('detail_order/create')}}" class="btn btn-primary">Tambah Detail Order</a><br></br>
			<div class="table table-responsive">
				<table id="detail_order" class="table table-striped,table-condensed">
					<thead>					
						<tr>
							<th>Id Detail Order</th>
							<th>Id Order</th>
							<th>Id Masakan</th>
							<th>Keterangan</th>
							<th>Status Detail Order</th>
							<th>Aksi</th>
							<th>Hapus</th>
						</tr>
						</thead>
					<tbody>
						@foreach($detail_order as $data)
						<tr>
							<td>{{$data->id}}</td>
							<td>{{$data->id_order}}</td>
							<td>{{$data->id_masakan}}</td>
							<td>{{$data->keterangan}}</td>
							<td>@if($data->status_detail_order === 'Siap')<label class="label label-success">{{$data->status_detail_order}}</label>
								@endif
								@if($data->status_detail_order === 'Belum')
								<label class="label label-danger">{{$data->status_detail_order}}</label>@endif</td>
							<td>
								<a href="{{url('detail_order/edit/'.$data->id)}}" class="btn btn-warning">Edit</a>
							</td>
							<td>
								<form action="{{url('detail_order/hapus/'.$data->id)}}" method="post">
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
                $("#detail_order").dataTable();
            });
        </script>
@endsection