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
    
  <div id="main-wrapper" >
	<center><h2>Project Information</h2></center></br></br>
		<form action="edit.php" method="post">
			
			<div class="inner_container">
			<label><b>Project ID</b></label>
				<input type="text" placeholder="Project ID" name="Project_ID" required>
			<label><b>Project Name</b></label>
				<input type="text" placeholder="Project Name" name="Project_Name" required></br></br>
				<label><b>Project Date</b></label>
				<input type="date" name="Project_Date" id="date"placeholder="yyyy-dd-mm" value="" ></br></br>
				<label><b>Project Organization</b></label>
				

				<select type="text" value ="" placeholder="Project Organization" name="Project_Orzn" required>
        <optgrup label="college">
        <option>1</option>
        <option>2</option>
        </select>
       

        <label><b>Project Company</b></label>
				

				<select type="text" value ="" placeholder="Project Company" name="Project_Comp" required>
        <optgrup label="college">
        <option>1_GL</option>
        <option>2_FC</option>
        <option>3_MS</option>
        <option>4_GOV</option>
		
        </select></br></br>
        <label><b>Project Faculty</b></label>
				

				<select type="text" value ="" placeholder="Project Faculty" name="Project_Fac" required>
        <optgrup label="college">
        <option>Archana Mire</option>
        <option>Ravi Mathur</option>
        <option>Nayana Vaity</option>
        <option>Ramesh Shahabade</option>
		
        </select></br></br>

        <label><b>Team Name</b></label>
				<input type="text" placeholder="Team Name" name="Team_Name" required>
			<label><b>Team Leader</b></label>
				<input type="text" placeholder="Team Leader" name="Team_Leader" required></br></br>
        <button name="Add" class="add_btn" type="submit">Add</button>
				
				
				
				
				
			</div>
        </form>

        <?php
			if(isset($_POST['Add']))
			{
				$conn = config::conectphp();
                $Project_ID=$_POST['Project_ID'];
                $Project_Name=$_POST['Project_Name'];
				$Project_Date=$_POST['Project_Date'];
				
				$Project_Orzn=$_POST['Project_Orzn'];
				$Project_Comp=$_POST['Project_Comp'];
                $Project_Fac=$_POST['Project_Fac'];
                try{
                $sql = "INSERT INTO project (Project_ID,Project_Name,Project_Date,Project_Orzn,Project_Comp,Project_Fac)
                VALUES (:Project_ID, :Project_Name, :Project_Date, :Project_Orzn, :Project_Comp, :Project_Fac)";
                // use exec() because no results are returned
                $stmt = $conn->prepare($sql);
                $stmt->execute(['Project_ID'=>$Project_ID,
                'Project_Name'=>$Project_Name, 'Project_Date'=>$Project_Date,'Project_Orzn'=>$Project_Orzn,'Project_Comp'=>$Project_Comp, 
                'Project_Fac'=>$Project_Fac]);
                echo '<script type="text/javascript">alert("Project information added successfully")</script>';
                
            }
            catch(PDOException $e){
              echo '<script type="text/javascript">alert("Try again with proper information")</script>';

            }
            }
            if(isset($_POST['Add']))
			{
				$conn = config::conectphp();
                $Team_Name=$_POST['Team_Name'];
                $Team_Leader=$_POST['Team_Leader'];
				
                try{
                $sql = "INSERT INTO team (Team_Name,Team_Leader)
                VALUES (:Team_Name, :Team_Leader)";
                // use exec() because no results are returned
                $stmt = $conn->prepare($sql);
                $stmt->execute(['Team_Name'=>$Team_Name, 'Team_Leader'=>$Team_Leader]);
                
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
