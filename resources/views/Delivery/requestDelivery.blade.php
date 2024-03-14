@extends('layouts.partials.header')
@section('title', 'Mesa')
@section('content-main')
    <div class="container">
        <div class="row">
            <a href="{{ route('delivery.index') }}" class="btn btn-primary">Volver</a>
        </div>
        <div class="row">
            @forelse ($products as $product)
                <div class="card">
                    <div class="card-header">Producto</div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $product->name }}</p>
                        <p><strong>Capacidad:</strong> {{ $product->price }}</p>
                        <img src="data:image/jpeg;base64,{{ $product->image }}" alt="imagen del producto" width="100">
                        <form action="{{ route('deliverysProduct.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="deliveries_id" value="{{ $delivery->id }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="text" name="description" value="{{ old('description') }}">
                            <input type="submit" value="create">
                        </form>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="4">No hay productos registrados.</td>
                </tr>
            @endforelse
            <form action="{{ route('delivery.show') }}" method="POST">
                @csrf
                <input type="hidden" name="delivery" value="{{ $delivery->id }}">
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
                        <img src="data:image/jpeg;base64,{{ $item['image'] }}" alt="Imagen del producto" width="100">
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        <p>No hay productos registrados.</p>
                    </div>
                </div>
            @endforelse

            @if (count($items) > 0)
                <form action="{{ route('invoiceBill') }}" method="post">
                    @csrf
                    <input type="hidden" name="type_invoice" value="site">
                    <input type="hidden" name="deliveries_id" value="{{ $delivery->id }}">
                    <input type="hidden" name="items[]" value="{{ json_encode($items) }}">
                    <p><b>Total:</b>{{ $total }}</p>
                    <button type="submit">Facturar</button>
                </form>
            @endif
            @if (count($items) > 0)
                <form action="{{ route('deliverysProduct.updateStatusItems') }}" method="post">
                    @csrf
                    <input type="hidden" name="deliveries_id" value="{{ $delivery->id }}">
                    <input type="hidden" name="status" value="cooking">
                    <button type="submit">Enviar Comanda</button>
                </form>
            @endif
          
        </div>

    </div>
@endsection
