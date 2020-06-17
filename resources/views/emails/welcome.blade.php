@component('mail::message')
New Mail From {{Auth::user()->name}}

you have a new task

Thanks,<br>
{{ config('app.name') }}
@endcomponent
