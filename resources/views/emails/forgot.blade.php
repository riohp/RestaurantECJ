@component('mail::message')
    <h1><strong>Restablece tu contraseña</strong></h1>
    <p>Hola, {{ $user->name }}</p>
    <p>Restablezcamos tu contraseña para que puedas seguir disfrutando [NOMBRE DE LA APP].</p>
    @component('mail::button', ['url' => url('reset-password/'.$user->remember_token), 'style' => 'background-color: #FF0000; color: #ffffff;'])
        <strong>Restablece tu contraseña</strong>
    @endcomponent
    <p>Si no solicitaste restablecer tu contraseña, ignora este mensaje.</p>
    <strong>El equipo de, {{ config('app.name') }}</strong>
@endcomponent
