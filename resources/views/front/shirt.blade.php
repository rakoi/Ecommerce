@extends('layouts.header')
@section('pagecontent')

<div class="container">
	<div class="card singlecard" >
		<div class="row">
			<div class="col-md-6 col-lg-6 mb-4">
				<h4 class="card-title"> </h4>
				<a href=""><img class="card-img-top" src="{{url('images',$product->image)}}" alt=""></a>
			</div>
			<div class="col-md-6 col-lg-6 mb-4">
				<h2>{{$product->name}}</h2>
				 <p>Ksh : {{$product->price}}</p>
				 {{$product->id}}
				<form class="form" action="{{route('cart.edit',$product->id)}}">
				
					<div class="form form-group">
						<label ><h4>Select Size</h4></label>
						<select class="form form-control" name="size">
							<option value="Small">Small</option>
							<option value="Large">Large</option>
							<option value="Extra Large">Extra Large</option>
						</select>
					</div>
					<div class="form form-group">
					
						<label>Quantity</label> 
						<select name="Quantity" class="form form-control">						@for($i=0;$i<$product->quantity;$i++)
						<option>{{$i+1}}</option>
						@endfor
						</select>
					</div>
					<input type="submit" class="btn btn-success btn-block" value="Add to Cart">
				</form>
			</div>
		</div>
	</div>
</div>


@endsection

