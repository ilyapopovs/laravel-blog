@extends('layouts.app')

@section('content')
    <div class="container py-10">
        <div class="w-8/12 mx-auto p-6 bg-theme-primary rounded-lg">
            <x-post :post="$post"></x-post>
        </div>
    </div>
@endsection
