@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-medium mb-1">Create a new account</h1>
        </div>
        <div class="card pb-4">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name"
                           class="input w-full @error('name') border-red-500 @enderror"
                           value="{{ old('name') }}">

                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username"
                           class="input w-full @error('username') border-red-500 @enderror"
                           value="{{ old('username') }}">

                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email (can be fake)"
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
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           placeholder="Repeat your password"
                           class="input w-full @error('password_confirmation') border-red-500 @enderror"
                           value="">

                    @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-primary w-full">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
