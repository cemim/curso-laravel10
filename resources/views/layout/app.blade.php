<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Produtos</title>
    {{-- sass Bootstrap --}}
    @vite(['resources/sass/app.scss'])
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @component('componente_navbar')            
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>
    {{-- Javascript Bootstrap --}}
    @vite(['resources/js/app.js'])
    <script type="text/javascript" src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    @hasSection ('javascript')
        @yield('javascript')
    @endif
</body>
</html>