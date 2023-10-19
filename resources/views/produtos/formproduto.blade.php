@extends('layout.app')

@section('body')
    <div class="card border row-margin-top-20">
        <div class="card-body">
            <form action="{{request()->routeIs('produtos.create') ? route('produtos.store') : route('produtos.update', ['produto'=>$prod->id])}}" method="POST">
                @if (request()->routeIs('produtos.edit'))
                    @method('PUT')
                @endif
                
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto" value="{{isset($prod) ? $prod->nome : ''}}">
                </div>
                <div class="form-group row-margin-top-20">
                    <label for="qtd">Quantidade</label>
                    <input type="text" class="form-control" name="qtd" id="qtd" placeholder="Quantidade" value="{{isset($prod) ? $prod->estoque : ''}}">
                </div>
                <div class="form-group row-margin-top-20">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço" value="{{isset($prod) ? $prod->preco : ''}}">
                </div>
                <div class="form-group row-margin-top-20">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-select">                        
                        @foreach ($cat as $c)
                            {{$selectedCategoria = ''}}
                            @if (isset($prod))
                                @if ($c->id==$prod->categoria_id)
                                    {{$selectedCategoria = 'selected';}}
                                @endif                                
                            @endif
                            <option value="{{$c->id}}" {{$selectedCategoria}}>{{$c->nome}}</option>
                        @endforeach                        
                    </select>                    
                </div>
                <div class="row-margin-top-20">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a href="{{ route('produtos.index') }}" class="btn btn-danger btn-sm">Cancelar</a>                    
                </div>                
            </form>
        </div>
    </div>
@endsection