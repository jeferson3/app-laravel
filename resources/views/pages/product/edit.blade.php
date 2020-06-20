@extends('layouts.app')

@section('title', 'edit')

@section('root')
    <div class="container">
        <form action="{{ route('product.update', $product->id) }}" method="post">
            {{-- criar um input com name _token e value csrf pra pegar o token default do laravel  --}}
            @csrf {{-- token no value automatico --}}
            {{-- <input type="hidden" name="_token" value={{ csrf_token() }}> token no value manual --}}

            {{-- enviando um requisição PUT --}}
            {{-- <input type="hidden" name="_method" value="PUT">manual --}}

            @method('PUT') {{-- automatico --}}
   
            {{-- @component('components.form')
                @slot('title')
                    Editar produto
                @endslot
            @endcomponent --}}

            @include('components.form')
        </form>
    </div>
@endsection


@push('style') {{-- manda style unico pra pagina root --}}

@endpush
