<?php
	session_start();
	include_once("dbconfig/config.php");
	
?>

<!DOCTYPE html>
<html>
<head>




 <title>Project World</title>
 <link rel="stylesheet" type="text/css" href="style2.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js" ></script>
</head>
<body>

<header class="header1">
 <nav>
  <div class="logo">
   <h1>SOFTWARE PROJECTS SYSTEM</h1>
  </div>
  <div class="menu"> 
   <ul>
     <li><a><h1>Welcome <?php echo $_SESSION['Student_ID']; ?></a></li>
     

    
    <li><a href="logout.php"><button type="button">Log Out</button></a></li>
    
   </ul>
  </div>
 </nav>

</header>
<section>
  
  <div class="sidebar">
        <header class="header2" >Workspace</header>
        <ul>
            <li><a href="#" > <a href="homepage.php" ><i class="fas fa-home"></i>Home</a></a> </li>
            <li><a href="#" > <a href="edit.php" ><i class="fas fa-edit"></i>Edit Project Info</a></a> </li>
            <li><a href="#"><a href="view.php" ><i class="fas fa-link"></i>View Repository</a> </li>
            <li><a href="#"><a href="update.php" ><i class="fas fa-cog"></i>Update Project</a> </li>
            
            <li><a href="#"><a href="delete.php" ><i class="fas fa-trash"></i>Delete Project</a> </li>
            <li><a href="#"><a href="viewproject.php" ><i class="fas fa-book"></i>View Project</a> </li>
            <li><a href="#" > <a href="Contact.php" ><i class="fas fa-question-circle"></i>Contact Us</a></a> </li>
        </ul>
      </div>
  
  <div class="rightside"> 
    
    <p>Welcome to Project World! Let's get started
Get started building your personal projects, testing out ideas, and more in your workspace.</P>
  
<a href="repositories.php"><button type="button" class="Repo_btn">Upload Repositories</button></a>
</div>
   
  
  
 </section>





</body>
</html>
