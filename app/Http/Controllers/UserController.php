<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\level;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user= User::all();
       return view('user.index')->withusers($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level =level::all();
        return view('user.create')->withlevel($level);
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
        'username' => 'required',
        'email' => 'required',
        'nama_user' => 'required',
        'password' => 'required',
        'id_level' => 'required',

        ]);

        $user = new user;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->nama_user = $request->input('nama_user');
        $user->password = bcrypt($request->input('password'));
        $user->id_level = $request->input('id_level');
        $user->save();
        return redirect()->route('user.index');

    }

    public function store2(Request $request)
    {
        $this->validate($request,[
        'username' => 'required',
        'email' => 'required',
        'nama_user' => 'required',
        'password' => 'required',
        'id_level' => 'required',

        ]);

        $user = new user;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->nama_user = $request->input('nama_user');
        $user->password = bcrypt($request->input('password'));
        $user->id_level = $request->input('id_level');
        $user->save();
        return redirect('login');

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
        $user=user::find($id);
        $level=level::all();
        return view('user.edit')->withusers($user)->withlevel($level);
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
        'username' => 'required',
        'email' => 'required',
        'nama_user' => 'required',
        'password' => 'required',
        'id_level' => 'required',

        ]);

        $user=user::find($id);
        $user->update([
        'username' =>request('username'),
        'email' =>request('email'),
        'nama_user' =>request('nama_user'),
        'id_level' =>request('id_level')
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=user::find($id)->delete();
        alert::success('Data Berhasil dihapus');
        return redirect()->route('user.index');
    }
}
