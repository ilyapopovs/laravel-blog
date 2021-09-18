<nav class="hidden md:block sm:sticky top-0 bg-theme-primary border-b border-theme-primary">
    <div class="container flex justify-between text-lg">
        <ul class="h-16 flex items-stretch">
            <li><a href="{{ route('home') }}" class="flex items-center h-full mx-3">Home</a></li>
            <li><a href="{{ route('dashboard') }}" class="flex items-center h-full mx-3">Dashboard</a></li>
            <li><a href="{{ route('posts') }}" class="flex items-center h-full mx-3">Posts</a></li>
        </ul>
        <ul class="h-16 flex items-stretch">
            @auth
                <li>
                    <a href="{{ route('users.posts', auth()->user() ) }}" class="flex items-center h-full mx-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form class="flex items-center h-full mx-3" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="h-full" type="submit">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}" class="flex items-center h-full mx-3">Login</a></li>
                <li><a href="{{ route('register') }}" class="flex items-center h-full mx-3">Register</a></li>
            @endguest
        </ul>
    </div>
</nav>

<nav class="block md:hidden w-full h-16 sm:sticky z-50 top-0">
    <div class="h-16 container relative z-40 bg-theme-primary">
        <ul class="flex justify-center items-center h-full">
            <li class="mr-auto">
                <a class="ml-8 text-theme-primary text-lg" href="{{ route('posts') }}">All Posts</a>
            </li>
            <li>
                <button id="navbar-dropdown-button" class="btn navbar-icon w-auto bg-transparent visible">
                    <span class="material-icons">menu</span>
                </button>
            </li>
        </ul>
    </div>
    <div id="navbar-dropdown" class="relative z-30 py-4 bg-theme-primary border-b border-theme-primary">
        <div class="container">
            @auth
                <ul class="flex flex-col-reverse sm:flex-row h-full">
                    <li><a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a></li>
                    <li class="sm:mr-auto"><a href="{{ route('home') }}" class="btn">Home</a></li>
                    <li>
                        <a href="{{ route('users.posts', auth()->user() ) }}" class="btn">Profile</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn sm:mr-0" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            @endauth

            @guest
                <ul class="flex flex-col sm:flex-row h-full">
                    <li><a href="{{ route('home') }}" class="btn">Home</a></li>
                    <li class="sm:mr-auto"><a href="{{ route('dashboard') }}" class="btn">Dashboard</a></li>
                    <li><a href="{{ route('login') }}" class="btn">Login</a></li>
                    <li><a href="{{ route('register') }}" class="btn btn-primary sm:mr-0">Register</a></li>
                </ul>
            @endguest
        </div>
    </div>
</nav>

<script>
    /* script for mobile navbar dropdown */

    window.isDropdownShown = false;
    const dropdown = document.getElementById('navbar-dropdown');

    document.getElementById('navbar-dropdown-button').addEventListener('click', () => {
        isDropdownShown = !isDropdownShown;

        isDropdownShown
            ? dropdown.classList.add('dropdown-shown')
            : dropdown.classList.remove('dropdown-shown');
    });
</script>
