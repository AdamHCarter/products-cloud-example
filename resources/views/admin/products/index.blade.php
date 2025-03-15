@extends('layouts.admin')
@section('title', 'Admin Products')

@section('content')
  <h1>Admin Products</h1>
  <a href="{{ route('admin.products.create')}}" class="btn btn-primary">Create Product</a>
  <p>
    {{ $products->appends(request()->input())->links() }}
  </p>
  <p>
    <form action="{{ route('admin.products.index') }}" method="GET">
      <input type="text" name="search" placeholder="Search" value={{ request('search') }}>
      <button type="submit" class="btn btn-primary">Search</button>
      <a class="btn btn-secondary" href="{{ route('admin.products.index') }}">Clear</a>
    </form>
  </p>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Product #</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($products as $product)
        <tr>
          <td><a href="{{ route("admin.products.show",$product)}}">{{$product->name}}</a></td>
          <td>${{number_format($product->price, 2, '.', ',')}}</td>
          <td>{{$product->item_number}}</td>
          <td>
            <a class="btn btn-secondary btn-sm" href="{{ route("admin.products.edit",$product)}}">Edit</a>
            <form class="d-inline" action="{{route('admin.products.destroy', $product)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{$product->name}}?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <p>No products to show.</p>
      @endforelse
    </tbody>
  </table>
  <p>
    {{ $products->links() }}
  </p>      
@endsection