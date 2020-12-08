<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">

    {{-- GOOGLE FONT --}}
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,500|Google+Sans:400,500,700|Material+Icons|Google+Sans+Display:400,500,700|Google+Sans+Text+Beta:400,500,700,400i,500i,700i" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{ $title ?? '' }}</title>
</head>

<body>

    <x-navbar />   
    <div id="indicator"></div>

    {{ $slot }}

    <x-footer />   

</body>

</html>
