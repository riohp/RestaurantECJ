@extends('layouts.landing')

@section('title', 'Lista de Usuarios')

@section('content')
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>estado</th>
                    <th>ver mas</th>
                    <th>editar</th>
                    <th>eliminar</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @if($user->status == 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}">
                                Ver
                            </a>
                            </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            @if($user->status == 1)
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form>
                            @else
                            <form method="POST" action="{{ route('users.activate', $user->id) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-link">activar</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
