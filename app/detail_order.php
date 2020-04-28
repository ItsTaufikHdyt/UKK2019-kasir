<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detail_order extends Model
{


    protected $table ='detail_order';
protected $guarded = [];

     public function order()
    {
        return $this->belongsTo('App\order');
    }

    public function masakan()
    {
        return $this->belongsTo('App\masakan', 'id_masakan', 'id');
    }
}
