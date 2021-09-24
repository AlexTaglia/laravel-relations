<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('/js/app.js') }}"></script>
    <title>BoolNews</title>
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/home') }}"> Home </a>
                    </li>
                    <li class="nav-item {{ Route::is('article.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('article.create') }}"> Add Article</a>
                    </li>
                </ul>
                </div>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            @yield('footer')
        </footer>

    </div>  
</body>
</html>