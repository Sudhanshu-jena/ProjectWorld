<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style1.css">
  <title>Project World</title>
</head>
<body>


<table>
<thead>
    <th>Project_ID</th>
    <th>Project_Name</th>
    <th>Repositorie</th>
    <th>Downloads</th>
    <th>Action</th>
</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['Project_ID']; ?></td>
      <td><?php echo $file['Project_Name']; ?></td>
      <td><?php echo $file['Repository']; ?></td>
      
      <td><?php echo $file['downloads']; ?></td>
      <td><a href="view.php?file_ID=<?php echo $file['id'] ?>">Download</a></td>
    </tr>
  <?php endforeach;?>

</tbody>
</table></br>
</div>
    <div class="ReturnButton">
    <a href="homepage.php"><button type="button" class="Repo_btn">Return to Home Page</button></a>
    </div>
    

</body>
</html>