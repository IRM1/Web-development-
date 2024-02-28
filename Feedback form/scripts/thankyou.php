<?php

     session_start();
     //check if session is open
     if(!isset($_SESSION['userResponses']))
     {
        echo"No submission data found. Please submit the form";
        exit;
     }
     $userResponses = $_SESSION['userResponses'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/thank.css">



  </head>
</head>
<body>
    <h1>Thank you for your Feedback</h1>
    <div>
    <p>Hello, <?php echo $userResponses['name'] ?></p>
    <p> Email: </br> <?php echo $userResponses['email'] ?></p>
    <p> Tel: </br> <?php echo $userResponses['tel'] ?></p>
    <p> Gender: </br> <?php echo $userResponses['gender'] ?></p>
    <p> Status </br> <?php echo $userResponses['status'] ?></p>
    <p> Interest: </br> <?php echo implode(" , </br>" ,  $userResponses['interests'] ) ?></p>
    <p> Major: </br> <?php echo $userResponses['major'] ?></p>
    
</body>
</html>

