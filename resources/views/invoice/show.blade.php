@extends('layouts.partials.header')
@section('title', 'Factura')
@section('content-main')
    <div class="container">
        <div class="row">
            <a href="{{ route('invoice.index') }}" class="btn btn-primary">Volver</a>
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Factura</div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $invoice->total }}</p>
                        <p><strong>Capacidad:</strong> {{ $invoice->responsible_id }}</p>
                        <p><strong>Ubicación:</strong> {{ $invoice->tipo }}</p>
                        <p><strong>Estado:</strong> {{ $invoice->status ? 'Activo' : 'Inactivo' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
