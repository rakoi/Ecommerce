<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use App\Category;
use App\Product;
use Session;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::OrderBy('id','desc')->paginate(12);
        $Categories=Category::all();
        
        return  view('admin.index')->withProducts($products)->withCategories($Categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Categories=Category::all();
        return view('admin.products.create')->withCategories($Categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,array('Name'=>'required||max:25||min:5',
                                        'Description'=>'required||max:255||min:10',
                                        'Size'=>'required',
                                        'Image'=>'required||max:10000',
                                        'Quantity'=>'required',
                                        'Category'=>'required', 
                                        'Price'=>'required||max:4'
           ));
        $image=$request->Image;
        $imageName=$image->getClientOriginalName().date(now()).'.'.$image->getClientOriginalExtension();
        $image->move('images',$imageName);
        
        $product=new product();
        $product->name=$request->Name;
        $product->description=$request->Description;
        $product->size=$request->Size;
        $product->image=$imageName;
        $product->price=$request->Price;
        $product->quantity=$request->Quantity;
        $product->category_id=$request->Category;

        Session::flash("Success","Item Added");
        $product->save();  
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product=Product::where('id','=',$id)->first();
        
        return view('front.shirt')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=product::findorFail($id);
       
        $product->delete();
        Session::flash("Success","Product deleted");
        return redirect()->back();
    }
}
