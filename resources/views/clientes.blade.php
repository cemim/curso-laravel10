<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Clientes</title>
    {{-- sass Bootstrap --}}
    {{-- INSTALL --}}
    {{-- composer require laravel/ui --dev --}}
    {{-- php artisan ui bootstrap --auth --}}
    {{-- npm install bootstrap-icons -save-dev --}}    
    {{-- Adicionar chamada dos icons no arquivo saas/app.scss: --}}
    {{-- @import 'bootstrap-icons/font/bootstrap-icons.css'; --}}
    {{-- npm install run build --}}
    {{-- Importar o css e o JS no arquivo de template: --}}
    {{-- @vite(['resources/sass/app.scss']) --}}
    {{-- @vite(['resources/js/app.js']) --}}
     @vite(['resources/sass/app.scss'])
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <main role="main">
        <div class="row margin-top">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            Cadastro de Cliente
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="tabelaprodutos">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Endereço</th>
                                        <th>Idade</th>
                                        <th>Email</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $c)
                                        <tr>
                                            <td>{{$c->id}}</td>
                                            <td>{{$c->nome}}</td>
                                            <td>{{$c->endereco}}</td>
                                            <td>{{$c->idade}}</td>
                                            <td>{{$c->email}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('clientes.create') }}">Novo Cliente</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{asset('js/app.js')}}"></script>
    {{-- sass Bootstrap --}}
    @vite(['resources/js/app.js'])
</body>
</html>