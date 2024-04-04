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
    <h1>Thank you for Submission</h1>
    <div>
    <p>Hello, <?php echo $userResponses['name'] ?></p>
    <p> Email: </br> <?php echo $userResponses['email'] ?></p>
    <p> University Name </br> <?php echo $userResponses['universityName'] ?></p>
    <p>Sports interested in:</p>
    <p><?php echo $userResponses['check1'] ?></p>
    <p><?php echo $userResponses['check2'] ?></p>
    <p><?php echo $userResponses['check3'] ?></p>
    <p><?php echo $userResponses['check4'] ?></p>
    
    
</body>
</html>

