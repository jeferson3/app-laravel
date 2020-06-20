<div class="row justify-content-center mt-3">
    <nav>
        <a class="btn btn-primary" href={{ route('product.create') }}>cadastrar</a> |{{-- navegadno para a rota pelo name.funcao --}}
        <a class="btn btn-primary" href={{ route('product.index') }}>listar</a> | {{-- navegadno para a rota pelo name.funcao --}}
        {{-- <a href={{ route('product.edit', ['1']) }}>edit</a> | navegadno para a rota pelo name.funcao --}}
        {{ $link }} {{-- recebendo parametro das paginas que chamarem esse componente --}}
    </nav>
</div>