@extends('layouts.app')

@section('title', 'create')

@section('root')
    <div class="container">
        <form action={{ route('product.store') }} method="post" autocomplete="off" enctype="multipart/form-data">
            {{-- enctype é pra poder enviar arquivos pelo form --}}
            
            @csrf {{-- cria um input com name _token e value csrf() pra pegar o token default do laravel  --}}
            
            @component('components.form')
                @slot('title')
                    Cadastrar produto
                @endslot
            @endcomponent
        {{-- tratamento de erros basico --}}
        {{-- verifica se tem erros --}}
        {{-- @if ($errors->any()) 
            <div class="alert alert-danger" role="alert">
                <ul> --}}
                    {{-- percorre todos os erros --}}
                    {{-- @foreach ($errors->all() as $err)  --}}
                        {{-- imprimi o erro --}}
                        {{-- <li>{{ $err }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif  --}}
        </form>
    </div>
@endsection


@push('style') {{-- manda style unico pra pagina root --}}

@endpush