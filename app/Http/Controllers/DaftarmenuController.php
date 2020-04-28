<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use Auth;
use App\masakan;
use App\order;
use App\detail_order;
use DB;
class DaftarmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $masakan = masakan::all();
         $detail_order = detail_order::all();
       return view('daftarmenu.index',compact('masakan','detail_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function detail_order(Request $request, $id_order)
    {

           $this->validate($request,[
        'id_masakan' => 'required',
        ]);

        $detail_order=detail_order::find($id_order);
        $detail_order->update([
        'id_masakan' =>request('id_masakan'),
        'harga' =>request('harga'),
        'keterangan' =>request('keterangan'),
        'status_detail_order' =>request('status_detail_order')
        ]);

        return redirect()->route('daftarmenu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('detail_order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_order=detail_order::find($id)->delete();
        return redirect()->route('daftarmenu.index');
    }
public function proses_pesanan(Request $request)
    {
        $quantity = [];
        $keterangan = [];

        foreach ($request->quantity as $i => $q) {
            if ($q != null) {
                $quantity[$i] = $q;
                $keterangan[$i] = $request->keterangan[$i];
            }
        }

        Cookie::queue('pesanan', ['quantity' => $quantity, 'keterangan' => $keterangan], 50000);

       return redirect('/cart');
    }
public function cart(Request $request)
    {
        $masakan =masakan::get();
        return view('daftarmenu.cart', compact('request','masakan'));
    }
    public function finish(Request $request)
    {
        $order = Order::create([
            'id_user' => Auth::user()->id,
            'no_meja' => $request->no_meja,
            'keterangan' => null,
            'status_order' => 'dipesan',
            'tanggal' => date('Y-m-d')
        ]);

        $masakan = \App\masakan::all();

        foreach (Cookie::get('pesanan')['quantity'] as $i => $pesanan) {
            $masakan = \App\masakan::find($i);
            $detail_order = detail_order::create([
                'id_order' => $order->id,
                'id_masakan' => $masakan->id,
                'jumlah_masakan' =>$pesanan,
                'keterangan' => Cookie::get('pesanan')['keterangan'][$i]
            ]);
        }
        return redirect('/daftarmenu/status/'.$order->id);
    }

    public function order($id)
    {
        $order = \App\Order::where('id', $id)->with(['detail_order'=>function($detail_order){
            $detail_order->with(['masakan'])->get();
        }])->first();

        return view('daftarmenu.status', ['order'=>$order]);
    }
    public function destroy2($id)
    {
        $detail_order=detail_order::find($id_order)->delete();
        return redirect()->route('daftarmenu.index');
    }
}
