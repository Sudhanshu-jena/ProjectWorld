<?php
	session_start();
    include_once("dbconfig/config.php");
    
    
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- adding font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- adding style css -->
  <link rel="stylesheet" href="css/style1.css">
  <title>Project World</title>
</head>
<body>
  
  <section id="fancy-form">
   <div class="container">
    <div class="form-sections">
      <!-- Form left -->
      <div class="Form-left">
        <h1>Get In Touch</h1>
        <div class="line"></div> <!--border-bottom line-->
        <p>Contact us for latest news and updates. :)</p><br>

        <!--first Heading -->
        <h4>ADDRESS</h4>
         <span>Terna Enggniering College, Nerul, Navi Mumbai, 400706</span>
         <hr><br><br>

         <!--second Heading -->
        <h4>PHONE</h4>
         <span>(+91)9730620905</span>
         <hr><br><br>

       <!--third Heading -->
        <h4>EMAIL</h4>
         <span>sudhanshujena@ternaengg.ac.in</span> </br>
         <span>ishanbhagat@ternaengg.ac.in</span></br>
         <span>tejasmanjrekar@ternaengg.ac.in</span></br>
         <span>prathameshdhoke@ternaengg.ac.in</span>
         
         <hr> <br>

         <!-- social media icons -->
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-google"></a>
          <a href="#" class="fa fa-linkedin"></a>
          <a href="#" class="fa fa-youtube"></a>
      </div>

      <!-- form right -->
      <div class="Form-right">
        <h1>Contact Us</h1>
        <div class="line"></div>
        <!-- form -->
        <form action="Contact.php" method="POST">
          <h5>Name</h5>
          <input type="text" placeholder="Name" name="Name"><br><br>
          <h5>EmailL</h5>
          <input type="email" placeholder="Email" name="Email"><br><br>
          <h5>Phone No.</h5>
          <input type="number" placeholder="Phone No." name="Phone"><br><br>
          <h5>Your Message</h5>
          <textarea name="Message" id="Message" name="Message" cols="50" rows="7"></textarea><br>
          <button type="submit" name="Send" class="Repo_btn">Send</button>
          <button ><a href="homepage.php" >Back</a></button>
        </form>


      </div>
      <?php 
      if(isset($_POST['Send']))
      {
          $conn = config::conectphp();
          $Name=$_POST['Name'];
          $Email=$_POST['Email'];
          $Phone=$_POST['Phone'];
          $Message=$_POST['Message'];
          
          try{
          $sql = "INSERT INTO contact (Name, Email, Phone, Message)
          VALUES (:Name, :Email, :Phone, :Message)";
          // use exec() because no results are returned
          $stmt = $conn->prepare($sql);
          $stmt->execute(['Name'=>$Name, 'Email'=>$Email, 'Phone'=>$Phone, 'Message'=>$Message]);
          
          
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