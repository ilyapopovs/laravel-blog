@php
    /**
     * @var LengthAwarePaginator $posts
     */

    use Illuminate\Pagination\LengthAwarePaginator;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card pb-2">
            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-8">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4"
                                  class="bg-theme-secondary border-theme-primary border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                                  placeholder="Post something!"></textarea>

                        @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            @endauth

            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post"></x-post>
                    @if (!$loop->last)
                        <hr class="my-4 px-8 border-theme-primary" />
                    @endif
                @endforeach
            @else
                <p>There are no posts</p>
            @endif

            {{ $posts->links() }}
        </div>
    </div>
@endsection
