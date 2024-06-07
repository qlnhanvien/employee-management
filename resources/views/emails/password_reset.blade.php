<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Reset</title>
    </head>
    <body>
        <p>Hello,</p>
        <p>You are receiving this email because we received a password reset request for your account.</p>
        <p>Click the button below to reset your password:</p>
        <a href="{{ $resetUrl }}">{{ $resetUrl }}</a>
        <p>If you did not request a password reset, no further action is required.</p>
        <p>Thanks,</p>
        <p>{{ config('app.name') }}</p>
    </body>
</html>
