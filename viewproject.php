<?php
	session_start();
	include_once("dbconfig/config.php");
	
?>
<?php include 'filesLogic.php';?>
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
    
  <div id="main-wrapper" >
	<center><h2>Project Information</h2></center></br></br>
    <center><h3>Once confirm your project ID to view</h3></center></br></br>
		<form action="viewproject.php" method="post">
			
			<div class="inner_container">
			<label><b>Poject ID</b></label>
				<input type="text" placeholder="Project ID" name="Project_ID" required></br></br>
			
				
        
        <button name="Confirm" class="confirm_btn" type="submit">Confirm</button>
         
				
				
				
				
				
			</div>
        </form>

        <?php


if(isset($_POST['Confirm']))
			{
				$conn = config::conectphp();
                $Project_ID=$_POST['Project_ID'];
                
				
                try{
                $sql = "SELECT * FROM `project` WHERE `Project_ID` = :Project_ID";
                // use exec() because no results are returned
                $stmt = $conn->prepare($sql);
                $stmt->execute(array(":Project_ID"=>$Project_ID));
                
            
                
                    echo '<table width="70%" border="2" cellpadding="5" cellspacing="5">
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Project Date</th>
                        <th>Project Organisetion</th>
                        <th>Project Compny</th>
                        <th>Project Faculty</th>
                        
                    </tr>';
                    foreach($stmt as $row){
                        echo '<tr>
                        <th>'.$row ["Project_ID"].'</th>
                        <th>'.$row ["Project_Name"].'</th>
                        <th>'.$row ["Project_Date"].'</th>
                        <th>'.$row ["Project_Orzn"].'</th>
                        <th>'.$row ["Project_Comp"].'</th>
                        <th>'.$row ["Project_Fac"].'</th>
                    
                        
                    </tr>';
                    echo '</table>';


                    }
                    
                
        
                
                
                }
                catch(PDOException $e){

                }
            }
            
				
				
				
				
		?>
       
       
       
       
       
       
       
        </div>
        
</div>
   
  
  
 </section>





</body>
</html>
