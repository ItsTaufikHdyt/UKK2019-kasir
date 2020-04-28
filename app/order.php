<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table ='order';
    protected $fillable=[
    	'no_meja','tanggal','id_user','keterangan','status_order'
    ];

public function transaksi()
    {
        return $this->hasOne('App\transaksi', 'id_order', 'id');
    }
public function meja()
    {
        return $this->belongsTo('App\meja', 'no_meja', 'no_meja');
    }
    public function detail_order()
    {
        return $this->hasMany('App\detail_order', 'id_order', 'id');
    }
}
