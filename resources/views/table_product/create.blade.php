@extends('layouts.landing')
@section('title', 'Crear producto')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Crear Producto</div>
                <div class="card-body">

                    <form action="{{ route('table_product.store') }}" method="POST">

                        @csrf


                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Precio:</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cost">Costo:</label>
                            <input type="number" name="cost" id="cost" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Seleccione la categoría:</label>
                            <select name="category_id">
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
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
