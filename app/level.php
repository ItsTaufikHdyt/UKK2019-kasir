<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
     protected $fillable = [
        'nama_level', 
    ];

    public function level()
    {
    	return $this->hasmany('App\level');
    }
}
