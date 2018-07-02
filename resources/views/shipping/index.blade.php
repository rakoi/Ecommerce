@extends('layouts.header')
@section('pagecontent')
<div class="content">
	<div class="row">
		<div class="col col-md-3 col-lg-3 mb-4">
			<h4 style="padding-left: 20px">User info</h4>
		</div>
		<div class="col col-md-6 col-lg-6 mb-4">
		<br><br>
			<form action="{{route('proceedpayment')}}" method="POST">
			{{csrf_field()}}
				<div class="form form-group">
					<label>First Name</label>
					<input type="text" class="form-control" name="first_name" value="{{Auth::user()->first_name}}">
				</div>
				<div class="form form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" name="last_name" value="{{Auth::user()->last_name}}">
				</div>
				<div class="form form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
				</div>
				<div class="form form-group">
					<label>Phone</label>
					<input type="text" class="form-control" name="phone" value="{{Auth::user()->phone_number}}">
				</div>
			<input type="submit" class="btn btn-success btn-block" value="Proceed to payment">
			</form>
		</div>
		<div class="col col-md-3 col-lg-3 mb-4"></div>
	</div>
</div>

@endsection