@component('mail::message')
#Cher Membre,

{!! $message !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
