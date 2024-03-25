@extends('layouts.landing')

@section('title', 'Crear Mesa')
@section('content-landing')
    <div style="display: flex;  width: 100%; justify-content: center;">

        <div >
            <img src="{{ $imageBase64 }}" alt="chippz" style="display: block; width: 4rem; padding-top: 1rem; margin-left: 8rem" />

            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 0.5rem; ">
                <h4 style="font-weight: 600; font-size: 1.5rem; color: #111827; margin-left: 5rem">Restaurante ecj</h4>
                <p style="font-size: 1.125rem; color: #111827; margin-left: 8rem;">Calle 19</p>
            </div>

            <div style="display: flex; flex-direction: column; gap: 0.75rem; border-bottom: 1px solid #CBD2D9; padding-bottom: 1.5rem; font-size: 0.875rem;">
                <p style="display: flex; justify-content: space-between;  font-weight: 600; font-size: 1.125rem;">
                    <span style="color: #6B7280;">ID factura:</span>
                    <span style="margin-left: 12rem;">{{ $invoice->id }}</span>
                </p>
                <p style="display: flex; justify-content: space-between;  font-weight: 600; font-size: 1.125rem;">
                    <span style="color: #6B7280;">Tipo Pedido:</span>
                    <span style="margin-left: 10rem;">{{ $invoice->tipo }}</span>
                </p>
                <p style="display: flex; justify-content: space-between;  font-weight: 600; font-size: 1.125rem;">
                    <span style="color: #6B7280;">Facturo:</span>
                    <span style="margin-left: 7.5rem;">{{ $invoice->responsible->name }}</span>
                </p>
                <p style="font-weight: 600; font-size: 1.125rem; ">
                    <span style="color: #6B7280;">Fecha :</span>
                    <span style="margin-left: 5rem; ">{{ $invoice->created_at }}</span>
                </p>
              
            </div>

            <div style="display: flex; flex-direction: column; gap: 0.75rem; padding-top: 1rem; padding-bottom: 1rem; font-size: 0.875rem;border-bottom: 1px solid #CBD2D9;">
                <table style="width: 100%; text-align: start;">
                    <thead>
                        <tr>
                            <td style="padding-top: 0.5rem; padding-bottom: 0.5rem; font-weight: 600; font-size: 1.125rem;">Product</td>
                            <td style="min-width: 3.125rem; padding-top: 0.5rem; padding-bottom: 0.5rem; font-weight: 600; font-size: 1.125rem;">cant</td>
                            <td style="min-width: 2.75rem; padding-top: 0.5rem; padding-bottom: 0.5rem; font-weight: 600; font-size: 1.125rem;">Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($invoice->items as $item)
                        <tr >
                            <td style="padding-top: 0.5rem; padding-bottom: 0.5rem;  font-size: 1.125rem;">{{ $item->product->name }}</td>
                            <td style="min-width: 3.125rem; padding-top: 0.5rem; padding-bottom: 0.5rem; font-size: 1.125rem;">{{ $item->cant }}</td>
                            <td style="min-width: 2.75rem; padding-top: 0.5rem; padding-bottom: 0.5rem; font-size: 1.125rem;">{{ $item->subTotal }}</td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" style="font-size: 0.875rem; font-weight: 500; color: #6B7280;">No hay items registrados a la factura.</td>
                        </tr>
                        @endforelse
                        <tr>
                            <td style="padding-top: 0.5rem; padding-bottom: 0.5rem;  font-size: 1.125rem;"><strong>Total:</strong> {{ $invoice->total }}</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 0.5rem; ">
                <h4 style="font-weight: 100; font-size: 1.125rem color: #111827; margin-left: 5rem">restaurante@gmail.com</h4>
                <p style="font-size: 1.125rem; color: #111827; margin-left: 6rem;">+573004327658</p>
            </div>
        </div>
    </div>
@endsection
