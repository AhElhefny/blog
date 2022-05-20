@component('mail::message')
# Introduction

Thank you for being waited until we finished examination process<br/>
<strong>Now you can access your account </strong><br/>
Admin: Test Blog<br/>
E-mail : workdeveloptest@gmail.com<br/>
@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
