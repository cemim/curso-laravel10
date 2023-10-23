@extends('layout.app')

@section('body')
    <div class="card border row-margin-top-20">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            <table class="table table-ordered table-hover" id="tabelaProdutos">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>    
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#dlgProdutos" onclick="limpaModalProduto();">Novo Produto</button>
        </div>
    </div>
    <div class="modal fade row-margin-top-20" tabindex="-1" id="dlgProdutos" aria-labelledby="dlgProdutos" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Produto</h5>
                </div>
                <div class="modal-body">
                    <form action="" class="form-horizontal" id="formProduto">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group row-margin-top-20">
                            <label for="nome" class="control-label">Nome</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto">
                            </div>
                        </div>
                        <div class="form-group row-margin-top-20">
                            <label for="estoque" class="control-label">Quantidade</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="estoque" name="estoque" placeholder="Quantidade">
                            </div>
                        </div>
                        <div class="form-group row-margin-top-20">
                            <label for="preco" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="preco" name="preco" placeholder="Preço">
                            </div>
                        </div>
                        <div class="form-group row-margin-top-20">
                            <label for="categoria_id" class="control-label">Categoria</label>
                            <div class="input-group">
                                <select id="categoria_id" name="categoria_id" class="form-control">

                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer row-margin-top-20">                    
                    <button type="submit" onclick="submitForm(this);" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Ready
    $(function() {
        loadProdutos();
        loadCategoriasModal();        
    });

    function limpaModalProduto(){
        $('#formProduto input').val("");
    }
    
    function loadProdutos() {
        $.getJSON('/api/produtos', function(produtos){              
            for (let index = 0; index < produtos.length; index++) {
                linhaTabela = montarLinha(produtos[index]);                
                $('#tabelaProdutos>tbody').append(linhaTabela);
            }
        });
    }

    function montarLinha(produtos){
        linhaTabela = '<tr>';
        linhaTabela += '<td>' + produtos.id + '</td>';
        linhaTabela += '<td>' + produtos.nome + '</td>';
        linhaTabela += '<td>' + produtos.estoque + '</td>';
        linhaTabela += '<td>' + produtos.preco + '</td>';
        linhaTabela += '<td>' + produtos.nome_categoria + '</td>';
        linhaTabela += '<td>';
        linhaTabela += '<button class="btn btn-sm btn-primary" onclick="carregarProduto(' + produtos.id + ');">Editar</button>';
        linhaTabela += '<button class="btn btn-sm btn-danger" onclick="apagar(' + produtos.id + ');">Apagar</button>';
        linhaTabela +='</td>';
        linhaTabela += '</tr>';
        return linhaTabela
    }

    function loadCategoriasModal() {
        $.getJSON('/api/categorias', function(categorias){              
            for (let index = 0; index < categorias.length; index++) {
                opcao = '<option value="' + categorias[index].id + '">' + categorias[index].nome + '</option>';
                $('#categoria_id').append(opcao);
            }
        });
    }

    function submitForm(btn) {
        if ($('#id').val() != '') {
            editarProduto(btn);
        } else {
            novoProduto(btn);
        }
    }
    
    function novoProduto(btn){              
        let txtBtn = '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Salvando...</span>';
        btn.innerHTML = txtBtn;
        $(btn).attr('disabled', true);

        let dadosForm = getDataForm('formProduto');
        
        $.post('/api/produtos', dadosForm, function(data){
            console.log('Done');
        })
        .done(function (data) { produtoSucess(data, btn); })
        .fail(function (jqXHR, textStatus, errorThrown, data) { produtoError(data, btn); });
    }

    function produtoSucess(data, btn) {
        $(btn).attr('disabled', false);
        btn.innerHTML = 'Salvar';
        $('#formProduto input').val(""); // Limpar campos input
        $('#dlgProdutos').modal('hide');

        linhas = $('#tabelaProdutos>tbody>tr'); // Cria array com as linhas da tabela
        elemento = linhas.filter(function(i, elemento){return elemento.cells[0].textContent == data.id}); // Busca a linha pela coluna 0
        
        // Se houver o elemento na tabela ele atualiza o conteudo se nao adiciona uma nova linha
        if(elemento){
            elemento[0].cells[0].textContent = data.id;
            elemento[0].cells[1].textContent = data.nome;
            elemento[0].cells[2].textContent = data.estoque;
            elemento[0].cells[3].textContent = data.preco;
            elemento[0].cells[4].textContent = data.nome_categoria;
        } else {
            linhaTabela = montarLinha(data);
            $('#tabelaProdutos>tbody').append(linhaTabela);// Insere o produto na tabela
        }
    }

    function produtoError(data, btn) {
        $(btn).attr('disabled', false);
        btn.innerHTML = 'Salvar';
        console.log('Ocorreu um erro no cadastro!');
    }

    function editarProduto(btn) {
        let txtBtn = '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Salvando...</span>';
        btn.innerHTML = txtBtn;
        $(btn).attr('disabled', true);

        let dadosForm = getDataForm('formProduto');
        
        $.ajax({
            type:"PUT",
            url:"/api/produtos/" + dadosForm.id,
            context: this,
            data: dadosForm,
            success: function(data) {
                console.log('Sucess Edit');
                produtoSucess(data, btn);
            },
            error: function(error, data) {
                console.log(error);
                produtoError(data, btn);
            }
        });
    }

    // Recebe o ID do produto sem o #
    // Retorna um Objeto Json com os nomes dos campos
    function getDataForm(stringIdForm) {
        stringIdForm = '#' + stringIdForm;
        let arrCampos = $(stringIdForm).serializeArray();
        ObjRetorno = {};
        for(let i=0;i<arrCampos.length;i++){
            let name = arrCampos[i].name;
            ObjRetorno[name] =  arrCampos[i].value; //Cria um nome dinamico para o obejeto serialize
        }
        
        return ObjRetorno;
    }

    function apagar(id) {
        $.ajax({
            type:"DELETE",
            url:"/api/produtos/"+id,
            context: this,
            success: function() {
                console.log('Produto Apagado');
                linhas = $('#tabelaProdutos>tbody>tr'); // Cria array com as linhas da tabela
                elemento = linhas.filter(function(i, elemento){return elemento.cells[0].textContent == id}); // Busca a linha pela coluna 0
                if(elemento){
                    elemento.remove(); // Remove a coluna
                }                
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function carregarProduto(id){
        loadProdutoModal(id);
    }

    function loadProdutoModal(id){
        $.getJSON('/api/produtos/' + id, function(produto){    
            let arrCampos = $('#formProduto').serializeArray();
            
            for(let i=0;i<arrCampos.length;i++){
                let name = arrCampos[i].name;
                $("[name="+ name +"]").val(produto[name]);
                $('#dlgProdutos').modal('show');
            }
        });
    }
</script>
@endsection