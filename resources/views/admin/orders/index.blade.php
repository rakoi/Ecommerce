@extends('layouts.adminlayout')
@section('content')
<div class="row">
	<div class="col col-md-8 col-lg-8 mb-4 table">
		<table>
	<thead>
		<th>id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Phone</th>
		<th>Product</th>
		<th>Quantity</th>
		<th>Amount</th>
	</thead>
	@foreach($orders as $order)
	<tbody>
		<tr>
			<td>{{$order->id}}</td>
			<td>{{$order->first_name}}</td>
			<td>{{$order->last_name}}</td>
			<td>{{$order->phone}}</td>
			<td><a href="/product/{{$order->product->id}}">{{$order->product->name}}</a></td>
			<td>{{$order->product->quantity}}</td>
			<td>{{$order->amount}}</td>
			<td><a href="" class="btn btn-success">Mark Delivered</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
	</div>
</div>

	{{$orders->links()}}

@endsection