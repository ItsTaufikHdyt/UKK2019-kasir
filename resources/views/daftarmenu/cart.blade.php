@extends('adminlte::layouts.app')
@section('contentheader_title', 'Cart')
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="box box-default" style="box-shadow: 2px 2px 5px;">
    <div class="box box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="cart-product">
                                    <th class="cart-product-item">Product</th>
                                    <th class="cart-product-price">Price</th>
                                    <th class="cart-product-quantity">Quantity</th>
                                    <th class="cart-product-quantity">Note</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp

                                @foreach (\Cookie::get('pesanan')['quantity'] as $key => $pesanan)
                                    @php
                                        $masakan = \App\masakan::find($key);
                                    @endphp
                                <tr class="cart-product">
                                    <td class="cart-product-item">
                                        <div class="cart-product-name">
                                        <h6>{{ $masakan->nama_masakan }}</h6>
                                        </div>
                                    </td>
                                    <td class="cart-product-price">Rp. {{ number_format($masakan->harga,0) }}</td>
                                    <td class="text-center">
                                        {{ $pesanan }}
                                    </td>
                                    <td class="cart-product-item">
                                            <div class="cart-product-name">
                                            <h6>
                                                    {{ \Cookie::get('pesanan')['keterangan'][$key] }}
                                            </h6>
                                            </div>
                                        </td>
                                    <td class="cart-product-total">Rp. {{ number_format($masakan->harga * $pesanan,0) }}</td>
                                </tr>
                                @php
                                $total += $masakan->harga * $pesanan;
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- .cart-table end -->
                </div>
                <!-- .col-md-12 end -->

                </div>
            </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="box box-default" style="box-shadow: 2px 2px 5px;">
                <div class="box box-body">
                        
            <form action="{{url('/daftarmenu/finish')}}" method="POST">
                {{ csrf_field() }}

                            <h6>Your Table : {{Auth::user()->name}}</h6>

                            <h6>Choose Table</h6>

                            <select name="no_meja" class="form-control">
                                @foreach (\App\meja::where('status_meja','kosong')->get() as $meja)
                            <option value="{{ $meja->no_meja}}" class="form-control">{{ $meja->no_meja}}</option>
                                @endforeach
                            </select>


                            <ul class="list-unstyled" style="margin-bottom:50px;margin-top:50px;">
                                    <li>Totals Order :<span class="pull-right text-right cart-product-price"><h5>Rp. {{ number_format($total,0) }}</h5></span></li> <br>
                                        <li><span class="pull-right text-right"><button type="submit" class="btn btn-default btn-element">Order</button></span></li>
                                        <li><span class="pull-right text-right"><a class="btn btn-default btn-element" href="{{url('/daftarmenu')}}">Back</a></span></li>


                                    </ul>
                        </div>

                        <!-- .cart-note-amount end -->
                    </div>

                    <!-- .cart-note-amount end -->
                </div>
            </form>

            </div>
            <!-- .row end -->
        </div>
    </div>
@endsection
