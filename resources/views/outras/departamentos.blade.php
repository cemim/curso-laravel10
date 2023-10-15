@extends('layouts.principal')

@section('titulo', 'Departamentos')

@section('conteudo')
<h3>Departamentos</h3>
<ul>
    <li>Computadores</li>
    <li>Eletronicos</li>
    <li>Acessórios</li>
    <li>Roupas</li>
</ul>

{{-- Alias para o componente criado em  app\Providers\AppServiceProvider.php --}}
{{-- @component('components.alerta', ['titulo'=>'Info', 'tipo'=>'info']) @endcomponent  -> Sem o alias --}}
{{-- @alerta(['titulo'=>'Info', 'tipo'=>'info']) @endalerta  -> Com o alias e nas versões anteriores a 7 do laravel--}}
<x-alerta titulo="Info" tipo="info">
    <p><strong>Info</strong></p>
    <p>Info aleatória</p>
</x-alerta>

<x-alerta titulo="Success" tipo="success">
    <p><strong>Success</strong></p>
    <p>Exemplo de success</p>
</x-alerta>

<x-alerta titulo="Error" tipo="error">
    <p><strong>Error</strong></p>
    <p>Exemplo de error</p>
</x-alerta>

<x-alerta titulo="Warning" tipo="warning">
    <p><strong>Warning</strong></p>
    <p>Exemplo de warning</p>
</x-alerta>

@endsection