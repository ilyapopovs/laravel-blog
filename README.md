# laravel-blog

Demo blog app similar to Dev.to and/or Twitter, built with [Laravel](https://laravel.com/), styled
with [Tailwind CSS](https://tailwindcss.com/)

Nothing too fancy - just a clean app both visually and code-wise. \
The purpose of it is to serve as a reminder/example of how things are done the Laravel way.

## Local Installation

Prerequisites:
* node 16 with npm 7
* docker

In the project's directory run the following:
1. `cp .env.example .env`
2. `alias sail=./vendor/bin/sail`
3. `sail up -d`
4. `sail composer install`
5. `sail artisan migrate`
6. `npm i && npm run dev`
7. Open `localhost:8000` to see it working 🚀

## Credits

Up until the [First Pull Request](https://github.com/ilyapopovs/laravel-blog/pull/1) the app has been primarily
developed by going through Alex Garrett-Smith's [Laravel Crash Course](https://www.youtube.com/watch?v=MFh0Fd7BsjE). \
Thereafter, I added some _polish_ as I saw fit - the list of changes can be seen in
the [commit history](https://github.com/ilyapopovs/laravel-blog/commits/main).
