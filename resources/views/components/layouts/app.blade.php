<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofGJY/yjCsc5MYVp57B2z9c1Q1XvS+8X0j" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('fontawesome/fontawesome-free-6.4.2-web/css/all.min.css')}}" />

          @vite('resources/css/app.css')
    </head>
    <body>
        {{ $slot }}

    </body>
</html>
