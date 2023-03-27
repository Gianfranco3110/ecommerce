@component('mail::message')
# Cambio de Estatus

Hola {{ $sale->user->name }} tu orden N°.{{ $sale->id }} , ha cambiado de estatus <br>
su nuevo Estatus es {{ $sale->status }}.



Gracias,<br>
{{ config('app.name') }}
@endcomponent
