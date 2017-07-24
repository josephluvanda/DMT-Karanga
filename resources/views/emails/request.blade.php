<html>
<head></head>
<body>
<h4>{{$title}}</h4>
<p>{{$content}}</p>
@if(isset($username))
  <h5>Credentials</h5>
  <label>Username:</label>{{ $username }}<br>
  <label>Password:</label>{{ $password }}
  <p>Please <a href='{{ config("laraadmin.server_url") }}/login' target="_blank">login</a> to complete your profile</p>
@endif
</body>
</html>
