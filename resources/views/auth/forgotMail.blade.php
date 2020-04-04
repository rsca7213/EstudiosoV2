@component('mail::message')
Hola **{{$name}}**,  {{-- use double space for line break --}}
Su contraseña ha sido reiniciada correctamente,  
Su nueva contraseña es: **{{$pass}}**
@endcomponent