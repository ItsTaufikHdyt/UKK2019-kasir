@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
@foreach (\App\Order::with(['meja', 'detail_order'=>function($detail_order){
                $detail_order->with(['masakan'])->get();
              }])->where('status_order', 'dipesan')->get() as $order)

            <form action="{{ url('order/verify/' . $order->id) }}" method="POST">
              {{ csrf_field() }}
              <div class="col-xs-12 col-sm-6 col-lg-4">
                  <div class="panel panel-primary">
                    <div class="panel-heading padding_30">
                        <h3 class="no-margin ">Meja No {{ $order->no_meja}}</h3>
                    </div>
                    <div class="panel-body btc-table padding_30 overflow-table">
                      <table class="table no-margin">
                        <thead >
                          <tr>
                            <td>Masakan</td>
                            <td>Quantity</td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($order->detail_order as $detail_order)
                            <tr>
                              <td class="text-bold">{{ $detail_order->masakan->nama_masakan }}</td>
                              <td><p class="text-bold no-margin">{{ $detail_order->jumlah_masakan }}</p></td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <button type="submit" class="btn btn-default btn-element">FINISH</button>

                    </div>
                  </div>
                </div>
            </form>

              @endforeach
</div>
@endsection
