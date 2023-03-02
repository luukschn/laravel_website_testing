<!DOCTYPE html>
<html>
    <head>
        <title>My Website - @yield('title')</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>

    <body>
        <div class='container'>
            <div class='row'>
                <div class='col-md-3'>
                    @include('layouts.sidebar')
                </div>

                <div class='main-content'>
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>

