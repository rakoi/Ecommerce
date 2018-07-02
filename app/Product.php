<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use App\orders;
class Product extends Model
{
    public function Category(){
    	return $this->belongsTo('App\Product');
    }
    public function order(){
    	return $this->hasMany('App\orders');
    }
    public function showdescription(){
    	return substr($this->description,0,30)."...";
    }
}
