<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <title>Paginação</title>
    {{-- sass Bootstrap --}}
    {{-- INSTALL --}}
    {{-- composer require laravel/ui --dev --}}
    {{-- php artisan ui bootstrap --auth --}}
    {{-- npm install bootstrap-icons -save-dev --}}    
    {{-- Adicionar chamada dos icons no arquivo resources/saas/app.scss: --}}
    {{-- @import 'bootstrap-icons/font/bootstrap-icons.css'; --}}
    {{-- npm install run build --}}
    {{-- Importar o css e o JS no arquivo de template: --}}
    {{-- @vite(['resources/sass/app.scss']) --}}
    {{-- @vite(['resources/js/app.js']) --}}
    @vite(['resources/sass/app.scss'])
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Tabela de clientes
            </div>
            <div class="card-body">
                <h5 class="card-title">Exibindo {{$clientes->count()}} Clientes de {{$clientes->total()}} ({{$clientes->firstItem()}} a {{$clientes->lastItem()}})</h5>
                <table class="table table-hover">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Email</th>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->nome}}</td>
                            <td>{{$c->sobrenome}}</td>
                            <td>{{$c->email}}</td>
                        </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$clientes->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>    
    <script src="{{asset('js/app.js')}}"></script>
    {{-- sass Bootstrap --}}
    @vite(['resources/js/app.js'])
</body>
</html>