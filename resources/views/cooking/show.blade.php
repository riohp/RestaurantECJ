@extends('layouts.partials.header')
@section('title', 'Crear domicilio')
@section('content-main')
    <div class="container">
        <div class="row">
            <a href="{{ route('cooking.index') }}" class="btn btn-primary">Volver</a>
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Cocina</div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $cooking->name }}</p>
                        <p><strong>Ubicación:</strong> {{ $cooking->location }}</p>
                        <p><strong>Estado:</strong> {{ $cooking->status ? 'Activo' : 'Inactivo' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($products->isNotEmpty())
                <table>
                    <thead>
                        <tr>
                            <th>Nombre del Producto</th>
                            <th>Imagen del Producto</th>
                            <th>Nombre de la Mesa</th>
                            <th>boton</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product->name }}</td>
                                <td>
                                    <img src="data:image/jpeg;base64,{{$product->product->image}}" alt="imagen del producto" width="100">               
                                </td>
                                <td>{{ $product->table->nombre }}</td>
                                <td>
                                    <form action="{{ route('tablesProduct.updateStatus') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="table_id" value="{{ $product->table->id }}">
                                        <input type="hidden" name="product_id" value="{{ $product->product->id }}">
                                        <input type="hidden" name="cooking_id" value="{{ $cooking->id }}">
                                        <input type="hidden" name="status" value="table">
                                        <button type="submit" class="btn btn-primary">Cambiar Estado</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay productos registrados.</p>
            @endif

        </div>
        <div class="row">
            @if ($products_delivery->isNotEmpty())
                <table>
                    <thead>
                        <tr>
                            <th>Nombre del Producto</th>
                            <th>Imagen del Producto</th>
                            <th>id del pedido</th>
                            <th>boton</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products_delivery as $product_delivery)
                            <tr>
                                <td>{{ $product_delivery->product->name }}</td>
                                <td>
                                    <img src="data:image/jpeg;base64,{{$product_delivery->product->image}}" alt="imagen del producto" width="100">               
                                </td>
                                <td>{{ $product_delivery->delivery->id }}</td>
                                <td>
                                    <form action="{{ route('deliverysProduct.updateStatus') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="deliveries_id" value="{{ $product_delivery->delivery->id }}">
                                        <input type="hidden" name="product_id" value="{{ $product_delivery->product->id }}">
                                        <input type="hidden" name="status" value="prepared">
                                        <button type="submit" class="btn btn-primary">Cambiar Estado</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay productos registrados.</p>
            @endif

        </div>
    </div>
@endsection
