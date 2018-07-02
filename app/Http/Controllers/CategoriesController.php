<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Session;
use App\product;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::all();
        
        return view('admin.categories.index')->withCategories($categories);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,array(
                'Category'=>'required||max:25',
            ));
        $caregory=new Category();
        $caregory->name=$request->Category;
        $caregory->save();
        Session::flash('Success',"Category Added");
        
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
        $Categories=Category::all();
        $products=Category::find($id)->Product()->paginate(12);
        
        return view('admin.products.singlecategory')->withProducts($products)->withCategories($Categories);
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
        return "edit" ;
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
        $this->validate($request,array(
            'Category'=>'required||max:20'
            ));
      $category=Table('');
      dd($category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category=Category::find($id);
        $category->delete();
        Session::flash('Success',"Category Deleted");
        return redirect()->back() ;
    }
}
