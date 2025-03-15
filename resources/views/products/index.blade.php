@extends('layouts.products')
@section('title', 'All Products')

@section('content')
  <h1 class="display-1">Products</h1>
  @can('paginate', App\Models\Product::class)
    <p>
      {{ $products->appends(request()->input())->links() }}
    </p>
  @endcan
  @can('search', App\Models\Product::class)
    <p>
      <form action="{{ route('products.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search" value={{ request('search') }}>
        <button type="submit" class="btn btn-primary">Search</button>
        <a class="btn btn-secondary" href="{{ route('products.index') }}">Clear</a>
      </form>
    </p>
  @endcan
  <div class="row  g-4">    
    @forelse ($products as $product)
      <div class="col">
        <div class="card h-100" style="width: 18rem;">
          <a href="{{ route("products.show",$product)}}">
            <img src="{{$product->image}}" class="card-img-top img-fluid p-0 img-thumbnail" alt="Image of {{$product->name}}">
          </a>
          
          <div class="card-body">
            <h5 class="card-title"><a href="{{ route("products.show",$product)}}">{{$product->name}}</a></h5>
            <p class="card-text">${{number_format($product->price, 2, '.', ',')}}</p>
            <p><small class="text-muted">Product #: {{$product->item_number}}</small></p>
          </div>
        </div>
      </div>
    @empty
      <p>No products to show.</p>
    @endforelse
    @can('paginate', App\Models\Product::class)
      <p>
        {{ $products->links() }}
      </p>
    @endcan
  </div>
@endsection