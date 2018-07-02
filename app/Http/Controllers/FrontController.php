<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $products=Product::orderBy('id','desc')->paginate(12);
        $Category=Category::all();
    	return view('front.index')->withCategories($Category)->withProducts($products);
    }
    public function Category($id){
        $products=Category::find($id)->Product()->paginate(10);
        $Category=Category::all();
        return view('front.categories')->withCategories($Category)->withProducts($products);
        
    }
    public function contact()
    {
    	return 'contact';
    }
    public function shirt(){
    	return "irr";
    }
    public function cart(){
    	return 'cart';
    }
}
