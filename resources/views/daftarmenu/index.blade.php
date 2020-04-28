@extends('adminlte::layouts.app')
@section('contentheader_title', 'Daftar Menu')
@section('main-content')
<div class="container container-fluid spark-screen">
    <div class="row">
<div class="panel panel-primary ">
    <div class="panel-heading "><center>
        <h2>
        Makanan & Minuman
    </h2>
    </center></div>
<form action="{{url('daftarmenu/proses_pesanan')}}" method="post">
                        {{csrf_field()}}
   <div class="table table-responsive">
                <table class=" col-lg-10" >
                    <tbody>
                    
                        @foreach ($masakan as $i => $masakan)
                            <td>
                            {{$masakan->nama_masakan}}<br>
                            <img src="{{asset('/upload/'.$masakan->foto)}}" height="250" width="270"><br><strong><span style="font-size: 20px">Rp. {{number_format($masakan->harga, 0)}}</span></strong>
                                @if($masakan->status_masakan === 'Ready')<label class="label label-success">{{$masakan->status_masakan}}</label>
                                @elseif($masakan->status_masakan === 'Sold Out')
                                <label class="label label-danger">{{$masakan->status_masakan}}</label>@endif
                            <br></br>
                            @if($masakan->status_masakan === 'Ready')
                                    <input type="number" min="1"   name="quantity[{{ $masakan->id }}]" class="form-control" class="form-control" placeholder="Quantity" >
                                    <textarea type="text" class="form-control" ame="keterangan[{{ $masakan->id }}]"  placeholder="Add Note ( Optional )"></textarea>                             
                            @elseif ($masakan->status_masakan === 'Sold Out')
                            <input type="number" class="form-control" placeholder="Maaf Sedang Habis" readonly="true">
                                    <textarea type="text"  class="form-control" placeholder="Maaf Sedang Habis" readonly="true"></textarea>
                            @endif
                            </td>
                        
             @endforeach
                    </tbody>
                </table> 
                <div class="row text-center mt-20">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button class="btn btn-success  btn-lg"  type="submit">Order</button>
                </div>
            </div>
           </form>

            </div>
        </div>
    </div>
</div>
@endsection