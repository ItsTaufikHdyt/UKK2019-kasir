<html>
<div class="row" >
    <br>
    <br>
      
    <div class="col-md-4" style=" padding:20px;">
                {{-- <img src="assets-dash/logo/bo-hitam.png" width="150px;" alt=""> --}}
            </h3>
                <center><strong>Invoice </strong></center>
            </div>
            <div class="table" align="center">
                    <table border="1" style="border-collapse:collapse;">
                        <thead>
                            <tr>
                                <td class="text-bold"><strong>Masakan</strong></td>
                                <td class="text-bold text-right"><strong>Price</strong></td>
                                <td class="text-right text-bold"><strong>Quantity</strong></td>
                                <td class="text-right text-bold"><strong>Total</strong></td>
                            </tr>
                            @php
                                $subtotal = 0;
                                $total = 0;


                            @endphp
                            @foreach ($order->detail_order as $detail_order)

                            @php
                                $total = $detail_order->masakan->harga * $detail_order->jumlah_masakan;

                            @endphp
                                <tr>
                                    <td>{{ $detail_order->masakan->nama_masakan }}</td>
                                    <td class="text-right">Rp. {{ $detail_order->masakan->harga }}</td>
                                    <td class="text-right">{{ $detail_order->jumlah_masakan }}</td>
                                    <td class="text-right">Rp. {{ $total }}</td>
                                </tr>
                                @php
                                    $subtotal += $detail_order->masakan->harga * $detail_order->jumlah_masakan;
                                @endphp
                            @endforeach
                        </thead>

                            <tr>
                                <td class="highrow"></td>
                                <td class="highrow"></td>
                                <td class="highrow text-right"><strong>Subtotal</strong></td>
                                <td class="highrow text-right">Rp. {{ $subtotal }}</td>
                            </tr>
                            <tr>
                                <td class="emptyrow"></td>
                                <td class="emptyrow"></td>
                                <td class="emptyrow text-right"><strong>Date</strong></td>
                                <td class="emptyrow text-right">{{ $order->created_at }}</td>
                            </tr>
                        </tbody>
            </div>
    </div>
</div>
</html>