@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-medium mb-1">Enter existing account</h1>
        </div>
        <div class="card pb-4">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email"
                           class="input w-full @error('email') border-red-500 @enderror"
                           value="{{ old('email') }}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                           class="input w-full @error('password') border-red-500 @enderror"
                           value="">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary w-full">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
