<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Home.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="x-icon" href="jagran_logo1.jpg">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
      .dropbtn {
        background-color: rgba(255,255,255,0.8);
        color: black;
        padding: 16px;
        font-size: 18px;
        border: thick green;
        cursor: pointer;
      }
      
      .dropdown {
        position: relative;
        display: inline-block;
      }
      
      .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 151px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
      
      .dropdown-content a:hover {background-color: #f1f1f1;}
      .dropdown:hover .dropdown-content {display: block;}
      .dropdown:hover .dropbtn {background-color: green;}
    </style>
	<title> WT Mini Project (TC219,TC213,TC218) </title>
</head>
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand" href="home.php">
    	<img src="jagran_logo1.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> WT Mini Project (TC219,TC213,TC218) 
  		</a>
  <!-- Links -->
  		<ul class="navbar-nav ml-auto">
    		<li class="nav-item active">
      			<a class="nav-link" href="home.php">Home</a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link" href="practice.php">About Us</a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link" href="login.php">Not <?php
      			if(isset($_SESSION['username']))
      				{
      					echo $_SESSION['username'];
      				}
      			?>? Logout</a>
    		</li>
  		</ul>
	</nav>
	<div class="dropdown" style="float:right;">
      <button class="dropbtn">List of Colleges</button>
      <div class="dropdown-content">
        <a>Indian Institute of Technology</a>
		<a>National Institute of Technology</a>
		<a>Birla Institure of Technology and Science</a>
		<a>Sri Ramaswamy Memorial</a>
		<a>Vellore Institute of Technology</a>
      </div>
    </div>
	<div class="background">
		<h2>College Predictor</h2><br>
		<form method="post" action="home.php">
			<div id="center">
				<input class="ip" type="text" name="board" placeholder="Board's Percentage" required><br><br>
				<input class="ip" type="text" name="jee" placeholder="JEE Score" required><br><br>
				<input class="ip" type="text" name="bits" placeholder="BITS Score"><br><br>
				<input class="ip" type="text" name="srm" placeholder="SRMJEEE Score"><br><br>
				<input class="ip" type="text" name="vit" placeholder="VITEEE Score"><br><br>
				<input class="button" type="submit" name="submit" value="SUBMIT">
			</div>
		</form>
	</div>
	<?php 
		function test_input($data)
			{
				$data=trim($data);
				$data=stripcslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}

			if(isset($_POST['submit']))
			{
				$username=$password="";
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$board = test_input($_POST['board']);
					$jee = test_input($_POST['jee']);
					$bits = test_input($_POST['bits']);
					$srm = test_input($_POST['srm']);
					$vit = test_input($_POST['vit']);

					echo "<div class='background'>";
					echo "<h2>Predicted College</h2>";
					if($board<60)
						echo "Colleges won't accept your application";
					else
					{
						$avg = (($board*60) + ((($jee*100)/360)*40))/100;
						if($avg>87)
							echo "You are eligible to apply for Indian Institute of Technology<br>";
						else if($avg>60)
							echo "You are eligible to apply for National Institute of Technology<br>";
						if($bits>280)
							echo "You are eligible to apply for Birla Institure of Technology and Science<br>";
						if($srm>140)
							echo "You are eligible to apply for Sri Ramaswamy Memorial<br>";
						if($vit>80)
							echo "You are eligible to apply for Vellore Institute of Technology<br>";
					}
					echo "</div>";
				}
			}
	?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>