<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
<body class="status">
<div class="container">
            <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h4 style="color: white; font-size:120px;">Wait..</h4>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3" style="color: white;font-size:30px;">
                        <p class="text-white">Your order :</p>
                        <ul>
                            @foreach($order->detail_order as $i => $detail_order)
                        <li>{{ $i + 1  }}. {{ $detail_order->masakan->nama_masakan }} ({{ $detail_order->jumlah_masakan }}x)</li>
                            @endforeach
                        <li> <br>
                            Total Payment:
                            <?php
                                $total = 0;
                            foreach ($order->detail_order as $detail_order) {
                                $total += $detail_order->masakan->harga * $detail_order->jumlah_masakan;
                        }
                        ?>
                            Rp. {{ number_format($total, 0) }} .-
                        </li>
                        </ul>

                        <a class="tombol"  href="{{url('/daftarmenu')}}">Order Again</a>
                    </div>
                </div>
        <!-- .row end -->
    </div>
</body>