@extends('layouts.app')

@section('title', 'details')

@section('root')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 text-left mt-3 mb-5">
            <h1>Detalhe do produto</h1>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-sm-8">
                
                @component('components.card')
                @slot('header')
                <h2>{{ $product->name }}</h2>
                @endslot
                
                @slot('body')
                <img src="{{ $product->image }}" alt="product image" srcset="">
                <h2>{{ $product->description }}</h2>
                @endslot
                
                @endcomponent
            </div>
        </div>
        <div class="row justify-content-center m-3">
            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a class="btn btn-primary" href="{{ route('product.index') }}">voltar</a>
                <input type="submit" class="btn btn-danger" value="Deletar produto">
            </form>
        </div>
    </div>
@endsection
