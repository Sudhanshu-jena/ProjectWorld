<?php
	session_start();
	include_once("dbconfig/config.php");
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Project World Sign Up</title>

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

section{
	position: relative;
	width: 100%;
	height: 100vh;
	background: radial-gradient(#333,#000);
	overflow: hidden;
	display: flex;
	justify-content: center;
	align-items: center;
}
section .set4{
	position: absolute;
}
section .set{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	

}

section .set div{
	position: absolute;
	display: block;

}
section .set div:nth-child(1){
	left: 20%;
	animation: animate 15s linear infinite;
	animation-delay: -7s;
}
section .set div:nth-child(2){
	left: 50%;
	animation: animate 20s linear infinite;
	animation-delay: -5s;
}
section .set div:nth-child(3){
	left: 70%;
	animation: animate 20s linear infinite;
	animation-delay: 0s;
}
section .set div:nth-child(4){
	left: 0%;
	animation: animate 15s linear infinite;
	animation-delay: -5s;
}
section .set div:nth-child(5){
	left: 85%;
	animation: animate 18s linear infinite;
	animation-delay: -10s;
}
section .set div:nth-child(6){
	left: 0%;
	animation: animate 12s linear infinite;
	
}
section .set div:nth-child(7){
	left: 15%;
	animation: animate 14s linear infinite;
	
}
section .set div:nth-child(8){
	left: 60%;
	animation: animate 15s linear infinite;
	
}
@keyframes animate{
	0%{
		opacity: 0;
		top: -10%;
		transform: translate(20px) rotate(0deg);
	}
	10%{
		opacity: 1;

	}
	20%{
		transform: translate(-20px) rotate(45deg);

	}
	40%{
		transform: translate(-20px) rotate(90deg);
	}
	60%{
		transform: translate(20px) rotate(180deg);
	}
	80%{
		transform: translate(-20px) rotate(180deg);
	}
	100%{
		top: 110%;
		transform: translate(-20px) rotate(225deg);
	}

}
.set2{
	transform: scale(2) rotateY(180deg);
	filter: blur(2px);
}
.set3{
	transform: scale(0.8) rotateX(180deg);
	filter: blur(4px);
}


</style>
</head>
<body >

<section>
<div class="set">
    <div><img src="imgs/leaves1.png"></div>
	<div><img src="imgs/leaves2.png"></div>
	<div><img src="imgs/leaves3.png"></div>
	<div><img src="imgs/leaves4.png"></div>
	<div><img src="imgs/leaves1.png"></div>
	<div><img src="imgs/leaves2.png"></div>
	<div><img src="imgs/leaves3.png"></div>
	<div><img src="imgs/leaves4.png"></div>
	</div>
	<div class="set set2">
    <div><img src="imgs/leaves1.png"></div>
	<div><img src="imgs/leaves2.png"></div>
	<div><img src="imgs/leaves3.png"></div>
	<div><img src="imgs/leaves4.png"></div>
	<div><img src="imgs/leaves1.png"></div>
	<div><img src="imgs/leaves2.png"></div>
	<div><img src="imgs/leaves3.png"></div>
	<div><img src="imgs/leaves4.png"></div>
	</div>
	<div class="set set3">
    <div><img src="imgs/leaves1.png"></div>
	<div><img src="imgs/leaves2.png"></div>
	<div><img src="imgs/leaves3.png"></div>
	<div><img src="imgs/leaves4.png"></div>
	<div><img src="imgs/leaves1.png"></div>
	<div><img src="imgs/leaves2.png"></div>
	<div><img src="imgs/leaves3.png"></div>
	<div><img src="imgs/leaves4.png"></div>
	</div>
	<div id="main-wrapper" class="set4">
	
	<center><h2>Sign Up Form</h2></center>
		<form action="register.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
			<label><b>Student ID</b></label>
				<input type="text" placeholder="Student ID" name="Student_ID" required>
			<label><b>Student Name</b></label>
				<input type="text" placeholder="Student Name" name="Student_Name" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<label><b>Confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="cpassword" required>
				<label><b>Department ID</b></label>
				

				<select type="text" value ="" placeholder="Department ID" name="Student_Dep_ID" required>
        <optgrup label="college">
        <option>CS1</option>
        <option>CS2</option>
        <option>CS3</option>
        <option>IT1</option>
		<option>IT2</option>
		<option>CV</option>
		<option>ME</option>
		<option>EC</option>
        </select></br>


				<label><b>Project ID</b></label>
				<input type="text" placeholder="Project ID" name="Student_Prj_ID" required>
				

				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				
				
				
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['register']))
			{
				$conn = config::conectphp();
				$Student_ID=$_POST['Student_ID'];
				$Student_Name=$_POST['Student_Name'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				$Student_Dep_ID=$_POST['Student_Dep_ID'];
				$Student_Prj_ID=$_POST['Student_Prj_ID'];
				
				
				
				if($password==$cpassword)
				{
					$query = "select * from student where Student_ID='$Student_ID'";
					//echo $query;
					$stmt = $conn->prepare($query);
  					$stmt->execute();
				
				//echo mysql_num_rows($query_run);
				if($stmt)
					{
						if($stmt->rowCount() > 0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into student (Student_ID, Student_Name, password, Student_Dep_ID, Student_Prj_ID)
							 VALUES(:Student_ID, :Student_Name, :password, :Student_Dep_ID, :Student_Prj_ID)";
							$stmt = $conn->prepare($query);
  							$stmt->execute(['Student_ID'=>$Student_ID, 'Student_Name'=>$Student_Name, 'password'=>$password, 'Student_Dep_ID'=>$Student_Dep_ID, 'Student_Prj_ID'=>$Student_Prj_ID]);
							
							if($stmt)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['Student_ID'] = $Student_ID;
								$_SESSION['Student_Name']=$Student_Name;
								$_SESSION['password'] = $password;
								$_SESSION['Student_Dep_ID'] = $Student_Dep_ID;
								$_SESSION['Student_Prj_ID'] = $Student_Prj_ID;
								
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
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