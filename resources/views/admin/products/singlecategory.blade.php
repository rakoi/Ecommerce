@extends('layouts.adminlayout')
@section('content')


	<h1>Products</h1>
	@if(Session::has('Success'))
				<dir class="alert alert-success"> {{Session::get('Success')}}</dir>
			@endif
	 <div class="row">

	 @foreach($categories as $category)
	 	<div class="col col-md-3">
	 		<div class="card" id="categoriescards">
	 		<a href="{{url('admin/category',$category->id)}}">{{$category->name}}</a>
	 		</div>
	 	</div>
	@endforeach
	 </div>
	
    <div class="row">
	    @forelse($products as $product)
		   	<div class="col-md-4" id="singleproduct">
		   		<div class="card h-100">
		            <a href=""><img class="card-img-top" src="{{url('images',$product->image)}}" alt=""></a>
		            <div class="card-body">
		                <h4 class="card-title">
		                    <a href="">{{$product->name}}</a>

		                </h4>
		                <h5>{{$product->price}}</h5>
		                Remaining: <b>{{$product->quantity}}</b>
		                <p class="card-text">
		                  {{$product->showdescription()}}
		                </p>
		                <form action="{{route('product.destroy',$product->id)}}" method="POST">
		                {{csrf_field()}}
		                 {{ method_field('DELETE') }}
		                	<input type="submit"  class="btn btn-danger btn-block" value="Delete">
		                
		                	
		                </form>
		            </div>
		        </div>
		    </div>

	   	@empty     
	   		<div class="col-md-12 col-lg-12">
	   			<div class="alert alert-info">Un Available</div>
	   		</div>
	   		 
	   	@endforelse    
	  
    </div>
    	<CENTER>
    	{{$products->links()}}
    </CENTER>

@endsection
