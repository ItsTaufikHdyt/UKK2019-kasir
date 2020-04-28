@extends('Adminlte::layouts.app')
@section('main-content')
<div id="container">
  <div id="row" class="text-center">
    <h1>Menu</h1>

<div class="panel-body dash-table-markets no-padding overflow-table">
    <table class="table table-hover table-stripped table-bordered ">
      <thead style="background-color:#ffe139;">
         <tr>
                <th class="text-center">No</i></th>
                <th class="text-center">Date</i></th>
                <th class="text-center">User</i></th>
                <th class="text-center">Order</i></th>
                <th class="text-center">Total </i></th>
         </tr>
      </thead>
       <tbody>
            @foreach ($transaksi as $i => $transaksi)

             <tr>
                 <td class="text-center"><p class="no-margin">{{++$i}}</p></td>
                 <td><p class="no-margin">{{$transaksi->created_at}}</p></td>
                 <td><p class="no-margin">{{$transaksi->id_user}}</p></td>
                 <td><p class="no-margin">{{$transaksi->id_order}}</p></td>
                 <td><p class="no-margin">{{$transaksi->total_bayar}}</p></td>


            @endforeach
        </tbody>
      </table>
    </div>
  </div>

  </div>
</div>
@endsection