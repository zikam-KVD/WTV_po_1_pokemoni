<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/sass/styly.scss'
            ])

    </head>
    <body>
        <main id="detail">
            <div class="card no-blur">
                <h2>{{ $pokemon->nazev }}</h2>
                <img
                    src="{{ asset('images/' . $pokemon->url_obrazku) }}"
                    alt="{{ $pokemon->nazev }}"
                >
            </div>
        </main>
    </body>
</html>
