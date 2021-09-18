@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card pb-2">
            <x-post :post="$post"></x-post>
        </div>
    </div>
@endsection
