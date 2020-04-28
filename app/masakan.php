<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class masakan extends Model
{
   protected $table ='masakan';
   protected $fillable=[
    	'nama_masakan','foto','harga','status_masakan'
    ];


}
