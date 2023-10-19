@extends('layout.app')

@section('body')
    <div class="card border row-margin-top-20">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            @if (count($produtos) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->estoque}}</td>
                            <td>{{$produto->preco}}</td>
                            <td>{{$produto->nome_categoria}}</td>
                            <td style="display: flex; gap:5px;">
                                <a href="{{ route('produtos.edit', ['produto'=>$produto->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Apagar" class="btn btn-sm btn-danger">
                                </form>                                
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>                
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('produtos.create') }}" class="btn btn-sm btn-primary">Novo Produto</a>
        </div>
    </div>
@endsection