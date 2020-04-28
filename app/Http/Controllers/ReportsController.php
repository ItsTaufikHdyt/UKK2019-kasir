<?php

namespace App\Http\Controllers;
use App\Transaksi;
use Illuminate\Support\Facades\Input;
use App\Order;
use Illuminate\Http\Request;
use PDF;
class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dari = date_create(Input::get('dari'));
        $sampai = date_create(Input::get('sampai'));

        $diff = date_diff($dari, $sampai);

        $results = [];
        foreach (range(1, $diff->d + 1) as $i)
        {
            $tanggal = date('Y-m-d', strtotime('+'.($i-1).' days', strtotime(Input::get('dari'))));

            $penghasilan = 0;

            $orders = Order::where('tanggal', $tanggal)->with(['detail_order'=>function($detail_order){
                $detail_order->with(['masakan'])->get();
            }])->get();

            foreach ($orders as $order) {
                $penghasilan_perorder = 0;

                foreach ($order->detail_order as $do) {
                    $penghasilan_perorder += $do->masakan->harga * $do->jumlah_masakan;
                }

                $penghasilan += $penghasilan_perorder;
            }

            if ($orders->count() > 0) {
                $results[] = [
                    'tanggal' => $tanggal,
                    'total' => $penghasilan,
                    'jumlah_order' => $orders->count()
                ];
            }
        }
        return view('reports.index', compact('results'));
    }

public function cetak()
    {
        $dari = date_create(Input::get('dari'));
        $sampai = date_create(Input::get('sampai'));

        $diff = date_diff($dari, $sampai);

        $results = [];
        foreach (range(1, $diff->d + 1) as $i)
        {
            $tanggal = date('Y-m-d', strtotime('+'.($i-1).' days', strtotime(Input::get('dari'))));

            $penghasilan = 0;

            $orders = Order::where('tanggal', $tanggal)->with(['detail_order'=>function($detail_order){
                $detail_order->with(['masakan'])->get();
            }])->get();

            foreach ($orders as $order) {
                $penghasilan_perorder = 0;

                foreach ($order->detail_order as $do) {
                    $penghasilan_perorder += $do->masakan->harga * $do->jumlah_masakan;
                }

                $penghasilan += $penghasilan_perorder;
            }

            if ($orders->count() > 0) {
                $results[] = [
                    'tanggal' => $tanggal,
                    'total' => $penghasilan,
                    'jumlah_order' => $orders->count()
                ];
            }
        }
        $pdf = PDF::loadView('reports.print', compact('results'));
        $pdf->setPaper('a4','portrait');
        return $pdf->stream();

        // return view('reports.print1', compact('results'));

    }

}
