@extends('emails.layout')

@section('content')
<center>
	<h2>WELCOME TO TALENTSAGA</h2>
</center>

<p>Hello {{ $name }},</p>

<p>Welcome and thank you for joining Talentsaga! If you are a talent, now you can leverage your professional network. And if you are a Talent Seeker, we’re glad to have you and hope you find the perfect talents you need.</p>

<center>
	<a href="{{ route('frontend.home') }}" style="display: inline-block; color: #fff; background-color: #6FB6B8; line-height: 34px; padding: 0 20px; text-decoration: none;">Start to Explore</a>	
</center>

<p>If you need some help, please send it to Contact Us page on our website.</p>

<center>
	<a href="{{ route('frontend.home.contactus') }}" style="display: inline-block; color: #fff; background-color: #6FB6B8; line-height: 34px; padding: 0 20px; text-decoration: none;">Contact Us Link</a>	
</center>

<p>
Cheers,
<br><br>
Talentsaga Team
</p>
@endsection
