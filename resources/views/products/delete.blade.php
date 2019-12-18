@extends('layouts.layout')

@section('content')

    <h1 class="mt-5">Products</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">Index</a>
            </li>
            <li class="nav-item">
                <a href="{{route('products.create')}}" class="nav-link">Create</a>
            </li>
            <li class="nav-item">
                <a href="{{route('products.delete', ['product' => $product->id])}}" class="nav-link active">Delete Product</a>
            </li>
        </ul>
    </nav>

    <form action="/laravel60/public/products/{{$product->id}}" method="POST">
        @method('DELETE')
        @csrf

        <div class="form-group">
            <label for="productname">Productname</label>
            <input disabled type="text" name="productname" class="form-control" id="productname" aria-describedby="productnameHelp" value="{{$product->productname}}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea disabled class="form-control" name="description" id="description" rows="3">{{$product->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input disabled type="text" name="price" class="form-control" id="price" aria-describedby="priceHelp" value="{{$product->price}}">
        </div>

        <button type="submit" class="btn btn-primary">Delete</button>

    </form>

@endsection
