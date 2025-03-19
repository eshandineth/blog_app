<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
</head>
<body>
    <h2>Email Verification Required</h2>
    <p>We've sent a verification email to your registered email address. Please check your inbox.</p>

    <form action="{{ route('verification.resend') }}" method="POST">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
</body>
</html>
