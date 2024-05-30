<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <title>Recursos Humanos</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('/images/icon-grupo.png') }}" />
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body style="background-image: url('{{ asset('/images/fondo_login.png')}}');
background-size: cover; /* Hace que la imagen cubra toda la pantalla */
        background-position: center; /* Centra la imagen en la pantalla */
        /* Otras propiedades de estilo para el fondo del body */
        
">
    <div id="app" >
    
        <main class="py-4"  >
            @yield('content')
        </main>
    </div>
</body>
</html>
