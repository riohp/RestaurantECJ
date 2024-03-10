@extends('layouts.landing')
@section('title', 'Mesa')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Mesa</div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $table->nombre }}</p>
                    <p><strong>Capacidad:</strong> {{ $table->capaciodad }}</p>
                    <p><strong>Ubicación:</strong> {{ $table->location }}</p>
                    <p><strong>Estado:</strong> {{ $table->status ? 'Activo' : 'Inactivo' }}</p>
                    <a href="{{ route('table.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection