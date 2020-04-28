<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\masakan;
use Storage;

class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $masakan= masakan::all();
       return view('masakan.index',compact('masakan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masakan= masakan::all();
       return view('masakan.create',compact('masakan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->foto){
            Storage::delete($request->foto);
        }

        $upload = $request->file('foto')->store('upload');

        $this->validate($request,[
        'nama_masakan' => 'required',
        'foto' => 'required',
        'harga' => 'required',
        'status_masakan' => 'required',

        ]);

        $masakan = new masakan;
        $masakan->nama_masakan = $request->input('nama_masakan');
        $masakan->foto = $upload;
        $masakan->harga = $request->input('harga');
        $masakan->status_masakan = $request->input('status_masakan');
        $masakan->save();

        return redirect()->route('masakan.index');
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
        $masakan= masakan::find($id);
       return view('masakan.edit',compact('masakan'));
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
        if($request->foto){
            Storage::delete($request->foto);
        }

        $upload = $request->file('foto')->store('upload');

        $this->validate($request,[
        'nama_masakan' => 'required',
        'foto' => 'required',
        'harga' => 'required',
        'status_masakan' => 'required',

        ]);

        $masakan=masakan::find($id);
        $masakan->update([
        'nama_masakan' =>request('nama_masakan'),
        'foto' =>request('foto'),
        'harga' =>request('harga'),
        'status_masakan' =>request('status_masakan')
        ]);

        return redirect()->route('masakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masakan=masakan::find($id)->delete();
        return redirect()->route('masakan.index');
    }
}
