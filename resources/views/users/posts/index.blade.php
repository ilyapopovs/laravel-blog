@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
            <p>
                Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and
                received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}
            </p>
        </div>
        <div class="card pb-2">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post"></x-post>
                    @if (!$loop->last)
                        <hr class="my-4 px-8 border-theme-primary" />
                    @endif
                @endforeach

                {{ $posts->links() }}
            @else
                <p class="mb-4">{{ $user->name }} does not have any posts</p>
            @endif
        </div>
    </div>
@endsection
