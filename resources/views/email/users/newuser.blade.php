@component('mail::message')
# Introduction

New user has been added its information as following.<br/>
name : {{$name}}<br/>
E-mail : {{$email}}

@component('mail::button', ['url' => "http://127.0.0.1:8000/admin/users/all?name=$name"])
Check Information
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
