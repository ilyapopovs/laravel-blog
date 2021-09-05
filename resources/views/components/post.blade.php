@php
    /**
     * @var Post $post
     */

    use App\Models\Post;
@endphp

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user ) }}"
       class="font-bold">{{'@' . $post->user->username}}</a> {{ $post->created_at->diffForHumans() }}
    <p>
        <a href="{{ route('posts.show', $post) }}">{{ $post->body }}</a>
    </p>

    @can('delete', $post)
        <form action="{{ route('posts.delete', $post) }}" method="post" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan

    <div class="flex items-center">
        @if($post->user->id !== auth()->id())
            @auth
                @if (!$post->likedBy(auth()->user()))
                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                @else
                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form>
                @endif
            @endauth
        @endif

        <span>{{ $post->likes->count() }} {{ \Illuminate\Support\Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>
