@extends('adminlte::layouts.app')
@section('contentheader_title', 'History')
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
   <div class="box box-default" style="box-shadow: 2px 2px 5px;">
    <div class="box box-body">
      <div class="table table-responsive">
                <table id="history"class="table table-hover" data-page-length="10">
                  <thead>
                     <tr>
                        <th>No <i class="fa fa-sort"></i></th>
                        <th>Date  <i class="fa fa-sort"></i></th>
                        <th>No Meja<i class="fa fa-sort"></i></th>
                        <th>Order <i class="fa fa-sort"></i></th>
                        <th>Totals  <i class="fa fa-sort"></i></th>
						<th>Option  <i class="fa fa-sort"></i></th>
			</tr>
                  </thead>
                   <tbody>
                     @foreach (\App\Order::with(['transaksi', 'meja', 'detail_order'=>function($detail_order){
                        $detail_order->with(['masakan'])->get();
                      }])->orderBy('id','desc')->where('status_order', 'belum dibayar')->orwhere('status_order', 'dibayar')->get() as $i => $order)

                      <tr>
                          <td><p class="no-margin">{{++$i}}</p></td>
                          <td><p class="no-margin"> {{$order->created_at}} </p></td>
                          <td><p class="no-margin"> {{$order->meja->no_meja}} </p></td>
                          <td><p class="no-margin">
                            <table class="tabel">
                                <tr>
                                    <th>Menu</th>
                                    <th>Quantity</th>
                                </tr>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($order->detail_order as $detail_order)
                                    <tr>
                                        <td>{{ $detail_order->masakan->nama_masakan }}</td>
                                        <td>{{ $detail_order->jumlah_masakan }}</td>
                                    </tr>
                                    @php
                                        $total += $detail_order->jumlah_masakan * $detail_order->masakan->harga;
                                    @endphp
                                @endforeach
                            </table>
                            </p></td>
                          <td class="no-wrap"><span class="label label-success">Rp. {{ number_format($total,0) }}</span></td>
                          {{-- @if (Auth::user()->level->nama_level == "admin")
                                @if ($order->transaksi != null)
                                <td><label for="" class="label label-success">Paid</label></td>
                                @endif
                                @if ($order->transaksi == null)
                                <td><label for="" class="label label-success">Not Yet Paid</label></td>
                                @endif
						  @endif --}}

						  <td>
                              @if (Auth::user()->level->nama_level=="admin")


                                      <a href="{{ url('/order/invoice/' . $order->id) }}" class="btn btn-sm btn-success">Print Invoice</a>

                              @endif


                        </td>
                         </tr>

                     @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('custom_script')
  <script type="text/javascript">
            $(function() {
                $("#history").dataTable();
            });
        </script>
@endsection