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
                            <form action="{{ route('clientes.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nome">Nome do Cliente</label>
                                    <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome do Cliente">
                                </div>
                                <div class="form-group margin-top">
                                    <label for="idade">Idade do Cliente</label>
                                    <input type="number" id="idade" class="form-control" name="idade" placeholder="Idade do Cliente">
                                </div>
                                <div class="form-group margin-top">
                                    <label for="endereco">Endereço do Cliente</label>
                                    <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereco do Cliente">
                                </div>
                                <div class="form-group margin-top">
                                    <label for="email">E-mail do Cliente</label>
                                    <input type="text" id="email" class="form-control" name="email" placeholder="E-mail do Cliente">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm margin-top">Salvar</button>
                                <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-sm margin-top">Cancelar</a>                                
                            </form>
                        </div>

                        {{-- $errors é variavel que retorna da validação --}}
                        @if ($errors->any())
                            <div class="card-footer">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
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