@component('mail::message')
# Introduction

Welcome {{$companyName}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
