@extends('layouts.landing')
@section('title', 'Mesa')
@section('content')
<div class="container">
    <div class="row">
        <a href="{{ route('table.index') }}" class="btn btn-primary">Volver</a>
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Mesa</div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $table->nombre }}</p>
                    <p><strong>Capacidad:</strong> {{ $table->capaciodad }}</p>
                    <p><strong>Ubicación:</strong> {{ $table->location }}</p>
                    <p><strong>Estado:</strong> {{ $table->status ? 'Activo' : 'Inactivo' }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($products as $product)
        <div class="card">
            <div class="card-header">Producto</div>
            <div class="card-body">
                <p><strong>Nombre:</strong> {{ $product->name }}</p>
                <p><strong>Capacidad:</strong> {{ $product->price  }}</p>
                <img src="data:image/jpeg;base64,{{$product->image}}" alt="imagen del producto" width="100"> 
                <form action="{{route('tablesProduct.store')}}" method="post">
                    @csrf
                    <input value="{{ $table->id }}" type="hidden" name="table_id">
                    <input value="{{ $product->id }}" type="hidden" name="product_id">
                    <input type="submit" value="create">
                </form>
            </div>
        </div>
        @empty
        <tr>
            <td colspan="4">No hay productos registrados.</td>
        </tr>
        @endforelse
        <form action="{{ route('table.show') }}" method="POST">
            @csrf
            <input type="hidden" name="table" value="{{ $table->id }}">
            <label>Seleccione la categoría:</label>
            <select name="category_id">
                <option value="-1">Todas</option>
                @isset($categories)
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                @endisset
            </select>
            <button type="submit" class="btn btn-info btn-sm">Ver</button>
        </form>
    </div>
    <div class="row">
        <h2>Productos de la comanda</h2>
        @forelse ($items as $item)
            <div class="card">
                <div class="card-header">Producto</div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $item['name'] }}</p>
                    <p><strong>Precio:</strong> {{ $item['price'] }}</p>
                    <p><strong>Cantidad:</strong> {{ $item['quantity'] }}</p>
                    <p><strong>Subtotal:</strong> {{ $item['subtotal'] }}</p>
                    <img src="data:image/jpeg;base64,{{$item['image']}}" alt="Imagen del producto" width="100"> 
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body">
                    <p>No hay productos registrados.</p>
                </div>
            </div>
        @endforelse
    
        @if(count($items) > 0)
            <form action="{{ route('invoiceBill') }}" method="post">
                @csrf
                <input type="hidden" name="type_invoice" value="site">
                <input type="hidden" name="table_id" value="{{ $table->id }}">
                <input type="hidden" name="items[]" value="{{ json_encode($items) }}">
                <p><b>Total:</b>{{ $total }}</p>
                <button type="submit">Facturar</button>
            </form>
        @endif
    </div>
    
</div>
@endsection