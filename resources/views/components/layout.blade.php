<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- script typed.js --}}
   <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"> </script> 
    @livewireStyles
    <link rel="apple-touch-icon" sizes="180x180" href="{{Storage::url('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{Storage::url('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{Storage::url('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{Storage::url('favicon/site.webmanifest')}}">
    <title>tornopresto.com</title>
</head>
<body>
    <x-navbar/>
    <div class="min-vh-100">
        {{$slot}}
    </div>
    <x-footer/>
    
    <script src="https://kit.fontawesome.com/2ff2af688a.js" crossorigin="anonymous"></script>
    {{-- script swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    @livewireScripts   
</body>
</html>