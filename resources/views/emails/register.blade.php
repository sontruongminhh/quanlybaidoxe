@component('mail::message')

<h3>Hello  {{$user->name }}</h3>
<p>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum laboriosam vitae enim officia laudantium, in saepe! Ratione sapiente commodi necessitatibus ullam molestias impedit rem quibusdam, voluptatem distinctio modi tempora maxime!
</p>

<p>
    <a href="{{route('login')}}">Click here to verify your account</a>
</p>
@endcomponent