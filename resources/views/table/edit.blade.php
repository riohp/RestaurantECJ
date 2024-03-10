@extends('layouts.landing')
@section('title', 'Editar Mesa')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Editar Mesa</div>
                <div class="card-body">
                    <form action="{{ route('table.update', $table->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('name')
                            has-error
                            @enderror">
                            <label for="name">Nombre</label>
                            <input type="text" name="nombre" id="name" class="form-control" value="{{ old('nombre', $table->nombre) }}">
                            @error('name')
                            <span class="help-block
                                text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('capacity')
                            has-error
                            @enderror">
                            <label for="capacity">Capacidad</label>
                            <input type="number" name="capaciodad" id="capacity" class="form-control" value="{{ old('capaciodad', $table->capaciodad) }}">
                            @error('capacity')
                            <span class="help-block
                                text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('location')
                            has-error
                            @enderror">
                            <label for="location">Ubicación</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $table->location) }}">
                            @error('location')
                            <span class="help-block
                                text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('status')
                            has-error
                            @enderror">
                            <label for="status">Estado</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $table->status ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ !$table->status ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('status')
                            <span class="help-block
                                text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>

                    </form>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
