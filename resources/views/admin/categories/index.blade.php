	@extends('layouts.adminlayout')
	@section('content')

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
	      
	        <form action="/admin/deletecat" method="POST">
	         
	         {{csrf_field()}}
	        	<input type="text" name="Category" id="Category" value="" readonly="true" >
	        	<input type="submit" class="btn btn-danger" value="Delete">
	        </form>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	       <form method="GET" action="/admin/category/1">
	       {{csrf_field()}}
	       	<input type="submit" value="Delete">
	       </form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="well">
	@if(count($errors)>0)
		
		@foreach($errors->all() as $error)
		<div class="alert alert-danger">{{$error}}} </div>
		@endforeach
	@endif
	@if(Session::has('Success'))
	<div class="alert alert-success">{{Session::get('Success')}} </div>
	@endif

		<div class="row">
		<h1 id="data">HELO</h1>
		<div></div>
		<div class="col col-md-4 col-lg-4 mb-4" >
			<form method="POST" action={{route('category.store')}}>
			{{csrf_field()}}
				<div class="form form-group">
					<input required="true" class="form form-control" type="text" name="Category">
				</div>
			
		</div>
		<div class="col col-md-4 col-lg-4 mb-4">
			<input type="submit" class="btn btn-success btn-block" value="Add">
		</div>
		</form>
		</div>

		<div class="row">
			<div class="col col-md-12">
				<div class="table">
					<table>
						<thead>
							<th>id</th>
							<th>Categories</th>
							<th>Delete</th>
						</thead>
						<tbody>
							@foreach($categories as $category)
								<tr>
								<td>{{$category->id}}</td>
								<td>{{$category->name}}</td>
								<td>
								<form method="POST" action="{{route('category.destroy',$category->id)}}">
								{{csrf_field()}}
								 {{ method_field('DELETE') }}
									<input type="submit" class="btn btn-danger" value="Delete">
								
									
								</form>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	@endsection
	@section('script')
	<script type="text/javascript">
	    function putdata(data,id){
	     
	        document.getElementById('Category').value=data;
	        document.getElementById('Category').innerHTML=data;
	    }

	</script>
	@endsection