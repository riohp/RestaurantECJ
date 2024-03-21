@extends('layouts.partials.header')
@section('title', 'Editar producto')

@section('content-main')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Editar Producto
                    </div>
                    <div class="card-body">
                        <form action="{{ route('table_product.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Precio:</label>
                                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                            </div>
                            <div class="form-group">
                                <label for="cost">Costo:</label>
                                <input type="number" name="cost" id="cost" class="form-control" value="{{ $product->cost }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Categoría:</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    @isset($categories)
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                @endisset
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Estado:</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
