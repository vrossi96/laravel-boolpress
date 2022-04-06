@component('mail::message')
   <h1>From: {{ $contact['email'] }}</h1>

   <h5>{{ $contact['message'] }}</h5>

   @component('mail::button', ['url' => ''])
      Button Text
   @endcomponent

   Thanks,<br>
   {{ config('app.name') }}
@endcomponent
