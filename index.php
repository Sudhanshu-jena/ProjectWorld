<?php
	session_start();
	include_once("dbconfig/config.php")
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Project World Login</title>
<link rel="stylesheet" href="css/style.css">
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	

}
#main-wrapper{
	border-radius : 10px;
	background-color: #00C6A7;
	border: 3px solid #f1f1f1;
	width: 500px;
	margin: 0 auto;
}
.imgcontainer {
	text-align: center;
	background-color: #00C6A7;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 30%;
    border-radius: 50%;
}
section{
	display: flex; 
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background: linear-gradient(-30deg, #03a9f4, #3a78b7 50%,
	#262626 50%, #607d8b 100%);
	filter: hue-rotate(120deg);
	animation: animate 10s linear infinite;

	

}
@keyframes animate{
	0%{
		filter: hue-rotate(0deg);
	}
	100%{
		filter: hue-rotate(360deg);
	}
}
.Box{
	position: relative;
	padding: 50px;
	display: flex;
	justify-content: center;
	align-items: center;
	 
	
	background: rgba(255,255,255,0.1);
	border-radius : 10px;
	box-shadow: 0 5px 35px rgba(0,0,0,0.2);
	width: 500px;
	
}
.Box::after{
	content: '';
	position: absolute;
	top: 5px;
	left: 5px;
	right: 5px;
	bottom: 5px;
	border-radius: 20px;
	pointer-events: none;
	background: linear-gradient(to bottom, rgba(255,255,255,0.3) 0%,
	rgba(255,255,255,0.1) 15%, transparent 50%, transparent 85%,
	rgba(255,255,255,0.3) 100%);
}
</style>


</head>
<body>
	<section>
	<div id="main-wrapper" class="box">
	<center><h2>Login Form</h2></center>
			<div class="imgcontainer">
				<img src="imgs/group.png" alt="Avatar" class="avatar">
			</div>
		<form action="index.php" method="post">
		
			<div class="inner_container">
				<label><b>Student ID</b></label>
				<input type="text" placeholder="Enter Student ID" name="Student_ID" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button>
				<label > Don't have an account? </label>
				
				Click on Register Button to create one.
				<a href="register.php"><button type="button" class="register_btn">Register</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				$conn = config::conectphp();
				@$Student_ID=$_POST['Student_ID'];
				@$password=$_POST['password'];

				$query = "select * from student where Student_ID='$Student_ID' and password='$password' ";
				//echo $query;
				$stmt = $conn->prepare($query);
  				$stmt->execute();
				//echo mysql_num_rows($query_run);
				if($stmt)
				{
					if($stmt->rowCount() >0)
					{
					
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  					
					
					$_SESSION['Student_ID'] = $Student_ID;
					$_SESSION['password'] = $password;
					
					header( "Location: homepage.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
			
		
	</div>
	</section>
</body>
</html>