@extends('layout.app')

@section('body')    
<div class="row row-cols-1 row-cols-md-2 g-4 bg-light border border-secondary row-padding-bottom row-margin-top-20">
    <div class="col">
        <div class="card h-100 border border-primary">            
            <div class="card-body">
                <h5 class="card-title">Cadastro de Produtos</h5>
                <p class="card-text">
                    Aqui você cadastra todos os seus produtos.
                    Só não esqueça de cadastrar previamente as categorias.
                </p>
                <a href="{{ route('produtos.index') }}" class="btn btn-primary">Cadastre seus produtos</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 border border-primary">            
            <div class="card-body">
                <h5 class="card-title">Cadastro de Categorias</h5>
                <p class="card-text">
                    Cadastre as categorias dos seus produtos.
                </p>
                <a href="{{ route('categorias.index') }}" class="btn btn-primary">Cadastre suas categorias</a>
            </div>
        </div>
    </div>
</div>  
@endsection