<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Retrieve password</title>
</head>
<body>
<h1>You are trying to retrieve your password</h1>

<p>
  Please click the following link to enter the next step:
  <a href="{{ route('password.reset', $token) }}">
    {{ route('password.reset', $token) }}
  </a>
</p>

<p>
  If this is not your own operation, please ignore this email.
</p>
</body>
</html>
