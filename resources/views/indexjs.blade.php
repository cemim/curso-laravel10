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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Tabela de clientes
            </div>
            <div class="card-body">
                <h5 class="card-title" id="cardTitle"></h5>
                <table class="table table-hover" id="tabelaClientes">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Email</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <nav id="paginator">
                    <ul class="pagination">
                        {{-- <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    {{-- sass Bootstrap --}}
    @vite(['resources/js/app.js'])

    <script type="text/javascript">
        function carregarClientes(pagina) {
            $.get('/json', {
                page: pagina
            }, function(resp) {
                montarTabela(resp);
                montarPaginator(resp);
                $("#paginator>ul>li>a").click(function () {
                    carregarClientes($(this).attr('pagina'));
                });

                $("#cardTitle").html("Exibindo " + resp.per_page + " Clientes de " + resp.total + " (" + resp.from + " a " + resp.to +")");
            });
        }

        function montarTabela(data) {
            $('#tabelaClientes>tbody>tr').remove();
            for (let i = 0; i < data.data.length; i++) {
                s = montarLinha(data.data[i]);
                $('#tabelaClientes>tbody').append(s);
            }
        }

        function montarLinha(cliente) {
            return `
                <tr>
                    <td>${cliente.id}</td>
                    <td>${cliente.nome}</td>
                    <td>${cliente.sobrenome}</td>
                    <td>${cliente.email}</td>
                </tr>
            `
        }

        function montarPaginator(data) {
            $('#paginator>ul>li').remove();
            $('#paginator>ul').append(getItemAnterior(data));
            
            n = 10;
            if(data.current_page - n/2 <=1) {
                inicio = 1;
            }
            else if(data.last_page - data.current_page < n) {
                inicio = data.last_page - n + 1;
            }
            else {
                inicio = data.current_page - n/2;
            }           
            
            fim = inicio + n - 1;

            for (let i = inicio; i <= fim; i++) {
                s = getItem(data, i);
                $('#paginator>ul').append(s);
            }

            $('#paginator>ul').append(getItemProximo(data));
        }

        function getItemAnterior(data) {
            if (1 == data.current_page) {
                return `<li class="page-item disabled page-link">Anterior</li>`;    
            }
            return `<li class="page-item"><a class="page-link" pagina="${data.current_page-1}" href="javascript:void(0)">Anterior</a></li>`;    
        }

        function getItem(data, i) {
            if (i == data.current_page) {
                return `<li class="page-item active page-link">${i}</li>`;    
            }
            return `<li class="page-item"><a class="page-link" pagina="${i}" href="javascript:void(0)">${i}</a></li>`;    
        }

        function getItemProximo(data) {
            if (data.current_page == data.last_page) {
                return `<li class="page-item disabled page-link">Próximo</li>`;    
            }
            return `<li class="page-item"><a class="page-link" pagina="${data.current_page+1}" href="javascript:void(0)">Próximo</a></li>`;    
        }

        $(function() {
            carregarClientes(1);
        });
    </script>
</body>

</html>
