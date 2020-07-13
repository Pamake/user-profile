@component('mail::message')
#Dear User,

{{$message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
