@component('mail::message')
# Introduction

{{ $data }}

@component('mail::button', ['url' => $url])

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
