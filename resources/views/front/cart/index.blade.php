@extends('front.cart.cartlayout')
@section('pagecontent')

<div class="container">
	<div class="row">
		<div class="col col-md-1 col-lg-1 mb-4">
		
		</div>
		<div class="col col-md-9 col-lg-8 mb-4">
			<table class="table " >
				<thead>
					<th></th>
					<th>Item</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Size</th>
					<th>Price</th>
				</thead>
				<body>
				<?php $counter=1;?>
			

				@foreach($items as $item)

					<tr>
					
					<td>{{$counter}}</td>
					<td>{{$item->name}}</td>
					<td>{{$item->qty}}</td>
					<td>{{$item->options->size}}</td>
					<td>{{$item->subtotal}}</td>

					<td>
						<form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
						{{csrf_field()}}
						 {{ method_field('DELETE') }}
							<input type="submit" class="btn btn-danger" value="Remove">
						
						
						</form>
					</td>
					</tr>
					<?php $counter=$counter+1;?>
				@endforeach
				<td>Total</td>
				<td></td>
				<td></td>
				<td ><b>Ksh:{{Cart::total()}}</b></td>
				</body>
			</table>
			<a href="{{url('checkout')}}" class="btn btn-success btn-block">Purchase</a>
		</div>
		<div class="col col-md-2 col-lg-2 mb-4">
		<br>	
		<a href="/cart/empty" class="btn btn-warning btn-block">Empty Bag</a>
		<br>
		<a href="/" class="btn btn-info">Back to Shopping</a>
		</div>
	</div>
</div>


@endsection

