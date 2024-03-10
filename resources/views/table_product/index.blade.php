@extends('layouts.landing')
@section('title', 'Lista de Productos')

@section('content')
    <div class="container">
        <h1>Lista de Productos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Ver más</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        
                        <td>
                            {{ $product->id }}
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            {{ $product->description }}
                        </td>
                        <td>
                            {{ $product->price }}
                        </td>
                        <td>
                            @if($product->status == 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('table_product.show', $product->id) }}">
                                Ver
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('table_product.edit', $product->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <img src="data:image/jpeg;base64,{{$product->image}}" alt="imagen del producto" width="100">                       
                        </td>
                        <td>


                            @if($product->status == 1)
                                <form method="POST" action="{{ route('table_product.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('table_product.activate', $product->id) }}">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-link">Activar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>