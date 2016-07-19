<?php
//var_dump($_SESSION);
if(Session::exists('success'))
{
	echo "<div class='alert alert-info' role='alert'><h1>". Session::flash('success') . "</h1> </div>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/publicIndexDesign.css">
	<link rel="stylesheet" href="css/bootstrap-3.3.5-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<meta charset="utf-8">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>

<div class="container">
	<form action="" method="post" class="form">
		<h1>
	Login with your username and password
</h1>
			<div class="form-group">
				<label for="username" class="sr-only">username</label>
				<input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="enter username">
			</div>
			<div class="form-group">
				<label for="password" class="sr-only">password</label>
				<input type="text" class="form-control" name="password" id="password" autocomplete="off" placeholder="enter password">
			</div>

			<div class="checkbox">
				<label for="remember">
				<input type="checkbox" name="remember" id="remember" >Remember me
			</label>
			</div>

			<input type='hidden' name="token" value="<?php echo Token::generate(); ?>">
			<input type="submit" value="Log in" class="btn btn-primary">
		
	</form>
</div>
	
<div class="container">
	<h1>
	Register to use the SNL Web Chat 
</h1>
	
	<form action="CrtlLogin/register" method="post" class="form">
		
			<div class="form-group">
				<label for="first" class="sr-only">Enter first Name</label>
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
					<input type="text" class="form-control" name="first" id="first" autocomplete="off" placeholder="enter first name">
				</div>
			</div>
		<div class="form-group">
				<label for="last" class="sr-only">Enter last Name</label>
				<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
					<input type="text" class="form-control" name="last" id="last" autocomplete="off" placeholder="enter last name">
				</div>
			</div>
			<!-- username field -->
			<div class="form-group">
				<label for="newUsername" class="sr-only ">Choose Username</label>
				<div class="input-group ">
					<div class="input-group-addon "><span class="glyphicon glyphicon-user"></span></div>
					<input type="text" class="form-control" name="newUsername" id="newUsername" autocomplete="off" placeholder="enter username">
				</div>
			</div>
			<!-- password field -->
			<div class="form-group">
                <label for="newPassword" class="sr-only ">Choose password</label>
                    <div class="input-group ">
                        <div class="input-group-addon "><span class="glyphicon glyphicon-lock"></span></div>
                       <input type="password" class="form-control" name="newPassword" id="newPassword" autocomplete="off" placeholder="enter password">
                    </div>
                </div>
		
		<input type="submit" value="Register" class="btn btn-primary ">
	
</form>
	</div>
		</body>
</html>