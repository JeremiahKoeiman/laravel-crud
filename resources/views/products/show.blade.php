@extends('layouts.layout')

@section('content')

    <h1 class="mt-5">Products</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">Index</a>
            </li>
            <li class="nav-item">
                <a href="{{route('products.create')}}" class="nav-link">Create</a>
            </li>
            <li class="nav-item">
                <a href="{{route('products.show', ['product' => $product->id])}}" class="nav-link active">Product details</a>
            </li>
        </ul>
    </nav>

    <div class="card">
        <div class="card-header">
            Product details
        </div>
        <div class="card-body">
            <h2 class="card-title">{{$product->productname}}</h2>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text">Price: {{$product->price}}</p>
        </div>
    </div>


@endsection
