@extends('layouts.layout')

@section('content')

    <h1 class="mt-5">Reviews</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="{{route('reviews.index')}}" class="nav-link">Index</a>
            </li>
            @can('create reviews')
                <li class="nav-item">
                    <a href="{{route('reviews.create')}}" class="nav-link">Create</a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{route('reviews.show', ['review' => $review->id])}}" class="nav-link active">Review details</a>
            </li>
        </ul>
    </nav>

    <div class="card">
        <div class="card-header">
            Review details
        </div>
        <div class="card-body">
            <h2 class="card-title">{{$review->title}}</h2>
            <p class="card-text">{{$review->username}}</p>
            <p class="card-text">{{$review->body}}</p>
            <p class="card-text">Rating: {{$review->rating}}</p>
        </div>
    </div>


@endsection
