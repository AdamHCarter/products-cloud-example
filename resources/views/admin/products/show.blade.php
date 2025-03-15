@extends('layouts.admin')
@section('title', 'Detail')

@section('content')
  <div class="card mt-1 mb-3" style="max-width:300px;">
    <h5 class="card-header ">Detail</h5>
    <img src="{{$product->image}}" class="card-img-top img-fluid p-0 img-thumbnail" alt="Image of {{$product->name}}"   />

    <div class="card-body">
      <h3 class="card-title">{{$product->name}}</h3>
      <h4 class="card-text">${{number_format($product->price, 2, '.', ',')}}</h4>
      <p class="card-text">{{$product->description}}</p>
      <p><small class="text-muted">Product #: {{$product->item_number}}</small></p>
    </div>
  </div>
  <div>
    <a class="btn btn-primary" href="{{route("admin.products.index")}}">Back to all products</a>
  </div>
@endsection