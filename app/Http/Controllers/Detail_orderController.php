<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\detail_order;
use App\order;
use App\masakan;

class Detail_orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $detail_order = detail_order::all();
       return view('detail_order.index',compact('detail_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $detail_order = detail_order::all();
       $order = order::all();
       $masakan = masakan::all();
       return view('detail_order.create',compact('detail_order','order','masakan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'id_order' => 'required',
        'id_masakan' => 'required',
        'keterangan' => 'required',
        'status_detail_order' => 'required',        
        ]);

        $detail_order = new detail_order;
        $detail_order->id_order = $request->input('id_order');
        $detail_order->id_masakan = $request->input('id_masakan');
        $detail_order->keterangan = $request->input('keterangan');
        $detail_order->status_detail_order = $request->input('status_detail_order');
        $detail_order->save();

        return redirect()->route('detail_order.index');
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
       $detail_order = detail_order::find($id);
       $masakan =masakan::all();
       $order =order::all();
       return view('detail_order.edit',compact('detail_order','masakan','order'));
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
        $this->validate($request,[
        'id_order' => 'required',
        'id_masakan' => 'required',
        'keterangan' => 'required',
        'status_detail_order' => 'required',        
        ]);

        $detail_order=detail_order::find($id);
        $detail_order->update([       
        'id_order' =>request('id_order'),
        'id_masakan' =>request('id_masakan'),
        'keterangan' =>request('keterangan'),
        'status_detail_order' =>request('status_detail_order')
        ]);

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
        return redirect()->route('detail_order.index');
    }
}
