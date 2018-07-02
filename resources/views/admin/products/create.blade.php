@extends('layouts.adminlayout')
@section('content')
<div class="container">
	<div class="row">
	<div class="col col-md-2 col-lg-2 "></div>
		<div class="col col-md-8 col-lg-8 mb-4">
			@if(Session::has('Success'))
				<dir class="alert alert-success"> {{Session::get('Success')}}</dir>
			@endif
			@if(count($errors)>0)
				 @foreach($errors->all() as $error)
				<dir class="alert alert-danger">	    						{{$error}}
				</dir>
				@endforeach
			@endif
		  	<form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
		  	{{csrf_field()}}
		  		<div class="form form-group">
		  		<label>Name</label>
		  		<input type="text" name="Name" class="form form-control" required="true">
		  		</div>
		  		<div class="form form-group">
		  		<label>Description</label>
		  		<textarea type="text" name="Description" class="form form-control" required="true" ></textarea>
		  		</div>
		  		<div class="form form-group">
		  		<label>Quantity</label>
		  		<input type="number" name="Quantity" class="form form-control" required="true" >
		  		</div>
		  		<div class="form form-group">
		  		<label>Size</label>
		  		<select name="Size" class="form form-control">
		  			<option>Small(s)</option>
		  			<option>Medium(m)</option>
		  			<option>Large (l)</option>
		  			<option>Extra Large(xl)</option>
		  		</select>
		  		</div>
		  		<div class="form form-group">
		  		<label>Image</label>
		  		<input type="file" name="Image" class="form form-control" required="true">
		  		</div>
		  		<div class="form form-group">
		  		<label>Price</label>
		  		<input type="number" name="Price" class="form form-control" required="true">
		  		</div>
		  		<div class="form form-group">
		  		<label>Category</label>
		  			<select class="form form-control" name="Category">
		  				@foreach($categories as $category)
		  					<option value="{{$category->id}}">{{$category->name}}</option>
		  				@endforeach
		  			</select>
		  		</div>
		  		<center>
		  		<input type="submit" class="btn btn-success " value="Add Product">
		  		</center>
		  	</form>
		</div>
		<div class="col col-md-8 col-lg-8 mb-4">
		</div>
	</div>
</div>
@endsection