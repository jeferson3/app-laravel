@extends('layouts.app') {{-- importando o arquivo root --}}

@section('title', 'List') {{-- mandando valores para o arquivo root --}}

@section('root') {{-- mandando html da pagina index para a pagina root --}}
<style>
    .alert-message{
        position: absolute;
        top: 0;
        right: 5px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 text-left mt-3 mb-5">
        <h1>Lista de produtos</h1>
        </div>
    </div>       
    <div class="row justify-content-center">
            <div class="col-sm-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th >Nome</th>
                            <th>Price</th>
                            <th width=100>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $prod)
                        <tr>
                            <td>{{ $prod->name }}</td>
                            <td>{{ $prod->price }}</td>
                            <td>
                                <a href="{{ route('product.show', $prod->id)  }}">Details</a>
                                <a href="{{ route('product.edit', $prod->id)  }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-8">

                    {{ $products->links() }}
                    
                </div>
            </div>
        </div>
    </div>





    {{-- <div class="container">

        <h1>Listando produtos</h1>
        { --}}
        {{-- {{ $products[0] }} recebendo valores do ProductComponent@index --}}
        
        {{-- <hr> --}}
        {{-- <h4>adicionar components externos</h4> --}}
        {{-- @component('components.card') importando component car --}}
        {{-- mandando valor do header pro component card --}}
        {{-- sem especificar o slot ele manda direto pra variavel $slote no component --}}
        {{-- header card  --}}
        
        {{-- @slot('body') --}}
        {{-- especificando o slot ele manda pra variavel definida no component --}}
        {{-- body card
        @endslot
        @endcomponent
        
        <hr> --}}
        {{-- {{estrutura conticional do blade}} --}}
        {{-- <h4>estrutura condicional</h4>
        
        @if (count($products)>3)
        <h4>tem mais de 3 produtos</h4>
        
        @elseif(count($products)>1)
        <h4>tem mais de 1 produto</h4>
        
        @else
        <h4>tem 0 produtos</h4>
        @endif
        
        @empty($products)
        <h4>products esta vazio</h4>
        @else
        <h4>products nao esta vazio</h4>
        @endempty
        
        @isset($products)
        <h4>products existe</h4>
        @else
        <h4>products nao existe</h4>
        @endisset
        
        @auth
        <h4>autenticado</h4>
        @else
        <h4>nao autenticado</h4>
        
        @endauth

        <hr>

        {{-- estrutura de repetição --}}
        {{-- <h4>estrutura de repetição</h4> --}}
        {{-- @foreach ($products as $prod)
        <h5>{{$prod}}</h5>
        @endforeach --}}
        {{-- }
        
        </div> --}}


@endsection
    
    
    
    
    
    
    
    
    
    
    
    
    
    








