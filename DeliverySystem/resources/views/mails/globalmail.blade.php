@component('mail::message')
# {{ $mail->subject }}

{{ $mail->body }}

Met vriendelijke groet,<br>
{{ config('app.name') }}
@endcomponent
