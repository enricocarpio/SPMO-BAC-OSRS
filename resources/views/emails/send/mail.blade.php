@component('mail::message')
# Congratulations

<p style="text-align: justify">You are now registered as a supplier in UPLB. You can now participate in UPLB procurement activities. Please see the attached provided credential for your login account.</p>

Username: {{$user}} <br />
Password: {{$password}}

@component('mail::button', ['url' => config('app.url')])
Click here to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}, SPMO-BAC
@endcomponent