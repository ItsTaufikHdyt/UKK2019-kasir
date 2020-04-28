<div id="container">
  <div id="row" class="text-center">
    <h1>Transaksi Report</h1>
      {{ \Illuminate\Support\Facades\Input::get('dari') }} till {{ \Illuminate\Support\Facades\Input::get('sampai') }}
<div class="panel-body dash-table-markets no-padding overflow-table">
    <table class="table table-hover table-stripped table-bordered ">
      <thead style="background-color:#ffe139;">
         <tr>
                <th class="text-center">No</i></th>
                <th class="text-center">Date</i></th>
                <th class="text-center">Order</i></th>
                <th class="text-center">Total </i></th>
         </tr>
      </thead>
       <tbody>
           @php
               $total = 0;
               $jumlah_order = 0;
           @endphp
            @foreach ($results as $i => $res)

             <tr>
                 <td class="text-center"><p class="no-margin">{{++$i}}</p></td>
                 <td><p class="no-margin">{{$res['tanggal']}}</p></td>
                 <td><p class="no-margin">{{$res['jumlah_order']}}</p></td>
                 <td><p class="no-margin">{{$res['total']}}</p></td>

             </tr>
             @php
                 $total += $res['total'];
                 $jumlah_order += $res['jumlah_order'];
             @endphp
            @endforeach
            <tr>
                <td colspan="2" class="text-right">Totals</td>
                <td>{{ $jumlah_order }}</td>
                <td>{{ $total }}</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>

  </div>
</div>
<script>
window.print();
</script>