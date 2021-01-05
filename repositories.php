<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style1.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="repositories.php" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input id="Project_ID" placeholder="Project ID" type="text" name="Project_ID" class="Project_ID"></br>
          <input id="Project_Name" placeholder="Project Name" type="text" name="Project_Name" class="Project_Name"></br>
          <input id="Contributors" placeholder="Contributors" type="text" name="Contributors" class="Contributors"></br>
          <input id="Branch" placeholder="Branch" type="text" name="Branch" class="Branch"></br>
          <input type="file" name="myfile" name="Repository" class="Repository"> <br>
          <button type="submit" name="save">upload</button>
        </form>
      </div>
    </div>
    <div class="ReturnButton">
    <a href="homepage.php"><button type="button" class="Repo_btn">Return to Home Page</button></a>
    </div>
  
  </body>
</html>