@php
    /**
     * @var User $likedByUser
     * @var Post $likedPost
     */

    use App\Models\Post;
    use App\Models\User;
@endphp

@component('mail::message')
    # Your post was liked

    {{ $likedByUser->username }} liked one of your posts

    @component('mail::button', ['url' => route('posts.show', $likedPost)])
        View Post
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
