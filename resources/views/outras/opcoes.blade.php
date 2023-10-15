@extends('layouts.principal')

@section('titulo', 'Opcoes')

@section('conteudo')

<div class="options">
    <ul>
        <li><a class="warning {{request()->is('opcoes/1') ? 'selected' : ''}}" href="{{ route('opcoes', 1) }}">warning</a></li>
        <li><a class="info {{request()->is('opcoes/2') ? 'selected' : ''}}" href="{{ route('opcoes', 2) }}">info</a></li>
        <li><a class="success {{request()->is('opcoes/3') ? 'selected' : ''}}" href="{{ route('opcoes', 3) }}">success</a></li>
        <li><a class="error {{request()->is('opcoes/4') ? 'selected' : ''}}" href="{{ route('opcoes', 4) }}">error</a></li>
    </ul>
</div>

@if (isset($opcao))

    @switch($opcao)
        @case(1)
            <x-alerta titulo="Warning" tipo="warning">
                <p><strong>Warning</strong></p>
                <p>Exemplo de warning</p>
            </x-alerta>
            
            @break
        @case(2)
            {{-- Alias para o componente criado em  app\Providers\AppServiceProvider.php --}}
            {{-- @component('components.alerta', ['titulo'=>'Info', 'tipo'=>'info']) @endcomponent  -> Sem o alias --}}
            {{-- @alerta(['titulo'=>'Info', 'tipo'=>'info']) @endalerta  -> Com o alias e nas versões anteriores a 7 do laravel--}}
            <x-alerta titulo="Info" tipo="info">
                <p><strong>Info</strong></p>
                <p>Info aleatória</p>
            </x-alerta>
            @break
        @case(3)
            <x-alerta titulo="Success" tipo="success">
                <p><strong>Success</strong></p>
                <p>Exemplo de success</p>
            </x-alerta>
            @break
        @case(4)
            <x-alerta titulo="Error" tipo="error">
                <p><strong>Error</strong></p>
                <p>Exemplo de error</p>
            </x-alerta>
            @break          
    
        @default
        <p>Opção desconhecida</p>
            
    @endswitch    
@endif

{{-- Exemplo Uso bootstrap --}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>
  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection