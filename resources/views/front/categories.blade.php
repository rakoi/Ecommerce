@extends('layouts.header')
@section('pagecontent')
<div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4"  >Anvil's </h1>
          <div class="list-group" style="padding-bottom:20px">
           @foreach($categories as $category)
            <a href="/category/{{$category->id}}" class="list-group-item">{{$category->name}}</a>
        
            @endforeach
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


          <div class="row">

               @forelse($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href=""><img class="card-img-top" src="{{url('images',$product->image)}}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a  href="/product/{{$product->id}}">{{$product->name}}</a>
                  </h4>
                  <h5>{{$product->price}}</h5>
                  <p class="card-text">{{$product->showdescription()}}
                  
                  </p>
                  <a href="/product/{{$product->id}}" class="btn btn-success btn-block">Buy</a>
                </div>
      
              </div>
            </div>
            @empty
            <div class="col col-md-9 " style="padding-top: 20px">
            <div class="alert alert-danger">Sold Out</div>
            </div>
            @endforelse

          </div>
          {{$products->links()}}
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection