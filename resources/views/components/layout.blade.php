<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title_browser')</title>
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <h1 class="text-center text-5xl font-bold mt-10 mb-20">Dexma Blog</h1>
        <h3 class="text-center text-3xl font-bold mb-7">@yield('title_page')</h3>
        <div class="container mx-auto px-10">
            @section('main')
            @show
        </div>
    </body>
</html>
