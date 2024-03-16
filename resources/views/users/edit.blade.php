@extends('layouts.partials.header')

@section('title', 'Editar Usuario')

@section('content-main')
    <div class="container">
        <h1>Editar Usuario</h1>

        <form method="POST" action="{{ route('users.update', $user) }}">

            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"
                        required autofocus>
                </div>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"
                        required>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                <div class="col-md-6">
                    <input id="cellphone" type="text" class="form-control" name="cellphone"
                        value="{{ $user->cellphone }}" required>
                </div>
                @error('cellphone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Dirección</label>
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control" name="address"
                            value="{{ $user->address }}" required>
                    </div>
                </div>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">Rol</label>
                    <div class="col-md-6">
                        <select id="role" class="form-control" name="role" required>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="cashier" {{ $user->role == 'cashier' ? 'selected' : '' }}>Cajero</option>
                            <option value="waiter" {{ $user->role == 'waiter' ? 'selected' : '' }}>Mesero</option>
                        </select>
                    </div>
                </div>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label text-md-right">Estado</label>
                    <div class="col-md-6">
                        <select id="status" class="form-control" name="status" required>
                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactivo</option>
                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Activo</option>
                        </select>
                    </div>
                </div>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </div>
        </form>
    </div>
@endsection
