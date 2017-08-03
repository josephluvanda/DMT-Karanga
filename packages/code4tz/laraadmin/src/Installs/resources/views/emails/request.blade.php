<html>
<head></head>
<body>
<h4>{{$title}}</h4>
<p>{{$content}}</p>
@if(isset($username))
  <h5>Credentials</h5>
  <label>Username:</label>{{ $username }}<br>
  <label>Temporary Password:</label>{{ $password }} (Please reset password after login)
  <p>Please <a href='{{ url("/login") }}' target="_blank">login</a> to complete your profile</p>
@endif
</body>
</html>
