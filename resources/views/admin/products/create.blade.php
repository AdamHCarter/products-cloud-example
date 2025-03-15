@extends('layouts.admin')
@section('title', 'Create Product')

@section('content')
<h1>Create Product</h1>
@include('admin.products.errors')
<form method="POST" action="{{route('admin.products.store')}}">
  @csrf
  @include('admin.products.form')
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ route('admin.products.index') }}" class='btn btn-secondary'>Cancel</a>
</form>
@endsection