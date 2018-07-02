<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Product;
class orders extends Model
{
    //

    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
