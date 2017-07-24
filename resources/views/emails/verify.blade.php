Dear {{ $registration->firstname }},<br><br>

You have requested access on {{ url('/') }}. Please click link below to verify your email address.<br><br>

<a href={{ url('/email_verification/'.$registration->verification_token) }}>Verify Email</a><br><br>

Best Regards,
DMT - Karanga
