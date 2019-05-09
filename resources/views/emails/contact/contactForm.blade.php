@component('mail::message')
<h3>Contact from {{ config('app.name') }}</h3>

<ul>
    <li>Name: {{$data['name']}}</li>
    <li>Email: {{$data['email']}}</li>
    <li>Message: {{$data['message']}}</li>
</ul>

@endcomponent
