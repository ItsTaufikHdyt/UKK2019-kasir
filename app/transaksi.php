<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table ='transaksi';
    protected $fillable=[
    	'id_user','id_order','tanggal','total_bayar'
    ];
}
