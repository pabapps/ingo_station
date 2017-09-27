<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Welcome to iNGO forum Bangladesh {{$user->name}}!</h1>
	<br>
	<a href="{{route('sendEmailDone',["email"=>$user->email,"verifyToken"=>$user->verify_token])}}">Please click on this link to verify your mail address!</a>

</body>
</html>