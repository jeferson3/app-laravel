<div class="row justify-content-center">
    <div class="col-8 text-left mt-3 mb-5">
        <h1>{{ $title ?? 'Editar produto' }}</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" autofocus name="name" value="{{ $product->name ?? old('name') }}"
                class="form-control @error('name') is-invalid @enderror" placeholder="Name" >
                @foreach ($errors->get('name') as $err)
                    <small class="invalid-feedback">{{ $err }}</small>
                @endforeach
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">R$</div>
                </div>
            <input type="text" name="price" value="{{ $product->price ?? old('price') }}"
                class="form-control @error('price') is-invalid @enderror" placeholder="0.00">
                @foreach ($errors->get('price') as $err)
                    <small class="invalid-feedback">{{ $err }}</small>
                @endforeach
            </div>

        </div>
    </div>
</div>
<div class="row justify-content-center">

    <div class="col-md-8">
        <div class="form-group">
            <textarea type="text" cols="10" rows="5" name="description" value="" 
            class="form-control @error('description') is-invalid @enderror" placeholder="Description">
                {{ $product->description ?? old('description') }}
            </textarea>
            @foreach ($errors->get('description') as $err)
                <small class="invalid-feedback">{{ $err }}</small>
            @endforeach
        </div>
    </div>
</div>

    <div class="row justify-content-center">
    <div class="form-group">
        <div class="col-md-6">
            <input type="file" name="image">
            @foreach ($errors->get('image') as $err)
                <small style="list-style: none; color: #DC3545">
                    {{ $err }}
                </small>
            @endforeach
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>