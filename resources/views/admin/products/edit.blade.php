@extends('layouts.admin')
@section('title', 'Edit Product')

@section('content')
<h1>Edit Product</h1>
@include('admin.products.errors')
<form method="POST" action="{{route('admin.products.update', $product)}}">
  @csrf
  @method('PUT')
  @include('admin.products.form')
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ route('admin.products.index') }}" class='btn btn-secondary'>Cancel</a>
</form>
@endsection