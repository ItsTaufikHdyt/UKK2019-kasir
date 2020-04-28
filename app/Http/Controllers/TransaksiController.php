<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\order;
use app\user;
use Alert;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $transaksi = transaksi::all();
       return view('transaksi.payment',compact('transaksi'));
    }
public function history()
    {
        $transaksi = Transaksi::where('status_order','dibayar');
        return view('transaksi.history', compact('transaksi'));
    }
     public function cetak()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.print', compact('transaksi'));

    }
}
