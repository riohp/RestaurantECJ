@extends('layouts.landing')
@section('title', 'Crear Mesa')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Crear Mesa</div>
                <div class="card-body">
                    <form action="{{ route('table.store') }}" method="POST">
                        @csrf
                        <div class="form-group
                            @error('name')
                            has-error
                            @enderror">
                            <label for="name">Nombre</label>
                            <input type="text" name="nombre" id="name" class="form-control" value="{{ old('nombre') }}">
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
                            <input type="number" name="capaciodad" id="capacity" class="form-control" value="{{ old('capaciodad') }}">
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
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}">
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
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
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


                        