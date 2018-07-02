<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Product(){
    	return $this->hasMany('App\Product');
    }
}
