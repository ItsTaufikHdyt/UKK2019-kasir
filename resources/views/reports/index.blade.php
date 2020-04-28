@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
            <div class="row">
            <div class="box box-default col-lg-5" style="box-shadow: 2px 2px 5px;">
              <div class="box-heading padding_30">
                <h3> <i class="fa fa-file"></i> Reports</h3> <br>
              </div>
                <div class="box box-body">
                <form action="{{ url('reports/print') }}" method="GET" class="form-group">
                  <div class="form-group">
                    <label for="">From</label>
                    <input type="date" value="" name="dari" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Until</label>
                    <input type="date" name="sampai"  class="form-control">
                  </div>
                  <button type="submit" style="font-size:15px;" class="btn btn-info"><i class="fa fa-print fa-2x "></i></button>
                </form>
              </div>
              @if (\Illuminate\Support\Facades\Input::get('dari') != false && \Illuminate\Support\Facades\Input::get('sampai') != false )
              <div class="panel-body dash-table-markets no-padding overflow-table">
                <table id="trade-history" class="table table-cryptic dataTable no-footer" data-page-length="10">
                  <thead>
                     <tr>
                            <th>No <i class="fa fa-sort"></i></th>
                            <th>Date <i class="fa fa-sort"></i></th>
                            <th>Jumlah Order  <i class="fa fa-sort"></i></th>
                            <th>Total  <i class="fa fa-sort"></i></th>
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
                            <td colspan="2" class="text-right">Jumlah</td>
                            <td>{{ $jumlah_order }}</td>
                            <td>{{ $total }}</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                @endif
              </div>
           </div>
		</div>
@endsection