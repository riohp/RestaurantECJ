@extends('layouts.partials.header')

@section('title', 'Asignar una categoría')

@section('content-main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Asignar Categoría a la Cocina</div>
                    <div class="card-body">
                        <form action="{{ route('cooking.assign.category') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cooking_id" value="{{ $cooking->id }}">
                            <div class="form-group">
                                <label for="category_id">Seleccionar Categoría:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @if ($categories->isEmpty())
                                        <option value="">No hay categorías disponibles</option>
                                    @else
                                        <option value="" disabled selected>Seleccione una categoría</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>                                
                            </div>
                            <button type="submit" class="btn btn-primary">Asignar Categoría</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
