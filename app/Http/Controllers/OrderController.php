<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\user;
use App\detail_order;
use App\transaksi;
use PDF;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = order::all();
        $detail_order = detail_order::all();
       return view('order.index',compact('order','detail_order'));
    }

    public function verify($id)
    {
        Order::find($id)->update([
            'status_order' => 'belum dibayar'
        ]);

        return redirect()->back()->with('msg', 'Order is ready to serve');
    }

    public function bayar(Request $request, $id)
    {
        $order = Order::where('id', $id)->with(['detail_order'=>function($detail_order){
            $detail_order->with(['masakan'])->get();
        }])->first();


        $total = 0;

        foreach ($order->detail_order as $detail_order) {
            $total += $detail_order->masakan->harga * $detail_order->jumlah_masakan;
        }

        if ($request->money < $total) {
            return redirect()->back()->with('msgError', 'Money is not enough');
        }

        $order->update([
            'status_order' => 'dibayar'
        ]);

        Transaksi::create([
            'id_order' => $order->id,
            'id_user' => Auth::user()->id,
            'tanggal' => date('Y-m-d'),
            'total_bayar' => $total
        ]);

        return redirect()->back()->with(['success' => 'Kembalian '.($request->money - $total)]);
    }

    public function invoice($id)
    {
        $order = Order::with(['meja', 'detail_order'=>function($detail_order){
            $detail_order->with(['masakan'])->get();
        }])->where('id', $id)->first();

        $pdf = PDF::loadView('order.invoice', compact('order'));
        $pdf->setPaper('a4','portrait');
        return $pdf->stream();
    }
}
