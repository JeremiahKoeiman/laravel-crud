@extends('layouts.layout')

@section('content')

    <h1 class="mt-5">Error</h1>

    <div class="alert alert-danger">
        {{$exception->getMessage()}}
    </div>
@endsection
