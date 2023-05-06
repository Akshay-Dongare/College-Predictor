<?php
	session_start();
	if(isset($_SESSION['username']))
		unset($_SESSION['username']);
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title> WT Mini Project (TC219,TC213,TC218) </title>
	<link rel="stylesheet" type="text/css" href="Login.css">
	<link rel = "icon" href = "jagran_logo1.jpg" type = "image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body><!--http://mrwallpapers.com/wp-content/uploads/2018/10/wall-leaves-wooden-background-images-hd.jpg-->
<div>
<div class="form" id="login">
	<div class="box">
	<h3>LOGIN</h3>
	<script src="https://accounts.google.com/gsi/client" async defer></script>
	<div id="g_id_onload"
     data-client_id="512644267547-djb16bq1ti0nhrve4p830u0gshlp1daj.apps.googleusercontent.com"
     data-context="signin"
     data-ux_mode="popup"
     data-login_uri="http://localhost/College-Predictor/"
     data-nonce=""
     data-itp_support="true">
	</div>

	<div class="g_id_signin"  style="margin-left:125px;" 
		data-type="standard"
		data-shape="pill"
		data-theme="outline"
		data-text="continue_with"
		data-size="large"
		data-locale="en-US"
		data-logo_alignment="left">
	</div>
	<div>
		<?php
			function test_input($data)
			{
				$data=trim($data);
				$data=stripcslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}
			if(isset($_POST['login']))
			{
				session_start();
				$username=$password="";
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$username = test_input($_POST['Username']);
					$password = test_input($_POST['Password']);
					//echo $username,"<br>";
					//echo $password;

					$link = mysqli_connect("localhost", "root", "root");
					if (mysqli_connect_errno()) {
    					printf("Connect failed: %s\n", mysqli_connect_error());
    					exit();
					}
					mysqli_select_db($link,"College_Predictor"); //change this if your database name is different
					$results=mysqli_query($link,"select * from usertable where Username='$username' and Password='$password'") or die("failed to connect".mysqli_connect_error());
					$row=mysqli_fetch_array($results);
					if ($row['Username'] == $username && $row['Password'] == $password) {
						header("location: http://localhost/College-Predictor/home.php");
						$_SESSION['username'] = $username;
						$_SESSION['mes'] = "true";
					} 
					else {
					echo ("Login failed");
					}
					mysqli_close($link);
				}
			} 
		?>	
	</div>
	<form action="login.php" method="POST">
		<input class="input" type="text" name="Username" placeholder="Username" required><br>
		<input class="input" type="password" name="Password" placeholder="Password" required><br>
		<input class="button" type="submit" name="login" value="LOGIN"><br>
		<a id="oksignup">Sign Up here</a>
	</form>
    </div>
</div>
<div class="form reg" id="signup">
	<div class="box">
	<h3>SIGN UP</h3>
	<script src="https://accounts.google.com/gsi/client" async defer></script>
	<div id="g_id_onload"
     data-client_id="512644267547-djb16bq1ti0nhrve4p830u0gshlp1daj.apps.googleusercontent.com"
     data-context="signup"
     data-ux_mode="popup"
     data-login_uri="http://localhost/College-Predictor/"
     data-nonce=""
     data-itp_support="true">
	</div>

	<div class="g_id_signin"  style="margin-left:125px;" 
		data-type="standard"
		data-shape="pill"
		data-theme="outline"
		data-text="signup_with"
		data-size="large"
		data-locale="en-US"
		data-logo_alignment="left">
	</div>
	<?php
		if(isset($_POST['signup']))
		{
			$usernameSub=$password1=$password2="";
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$usernameSub = test_input($_POST['Username']);
				$password1 = test_input($_POST['Password']);
				$password2 = test_input($_POST['ConfirmPassword']);

				$link = mysqli_connect("localhost", "root", "root");
				if (mysqli_connect_errno()) {
    				printf("Connect failed: %s\n", mysqli_connect_error());
    				exit();
				}
				if(empty($usernameSub))
					array_push($error, "Please fill username");
				if(empty($password1))
					array_push($error, "Please fill password");
				if(empty($password2))
					array_push($error, "Please fill confirm password");
				if($password1 != $password2)
					echo "Password's don't match";
				else if($password1 == $password2)
				{
					mysqli_select_db($link,"College_Predictor");
					$results=mysqli_query($link,"insert into usertable(Username,Password) values('$usernameSub','$password1')") or die("failed to connect".mysqli_connect_error());
					header('localhost: http://localhost/College-Predictor/login.php');
					echo "Data Stored" ;
				}
				mysqli_close($link);
			}
		}
	?>
	<form action="login.php" method="POST">
		<input class="input" type="text" name="Username" placeholder="Username" required><br>
		<input class="input" type="password" name="Password" placeholder="Password" required><br>
		<input class="input" type="password" name="ConfirmPassword" placeholder="Confirm Password" required><br>
		<input class="button" type="submit" name="signup" value="SIGN UP"><br>
		<a id="oklogin">Login Here</a>
	</form>
    </div>
</div>
</div>
 <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="Login.js"></script>
</body>
</html>
