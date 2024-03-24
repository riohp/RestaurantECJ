@extends('layouts.partials.header')
@section('title', 'Editar categoría')

@section('content-main')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Editar Categoría</div>
                <div class="card-body">
                    <form action="{{ route('category.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="encrypted_category_id" value="{{ encrypt($category->id) }}">
                        <div class="form-group
                            @error('name')
                                has-error
                            @enderror">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                            @error('name')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('description')
                                has-error
                            @enderror">
                            <label for="description">Descripción:</label>
                            <textarea name="description" id="description" class="form-control" required>{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong> </span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('status')
                                has-error
                            @enderror">
                            <label for="status">Estado:</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('status')
                                <span class="help-block
                                    ">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Categoría</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
