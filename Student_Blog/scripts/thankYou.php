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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for Your Submission</title>
    <link rel="stylesheet" href="../css/thank.css">
</head>
<body>
    <header>
        <h1>Thank you for Your Submission</h1>
    </header>

    <section>
        <h2>User Details</h2>
        <p>Hello, <?php echo htmlspecialchars($userResponses['username']); ?></p>
        <p>Your message:</p>
        <p>
            <?php echo htmlspecialchars($userResponses['message']); ?>
            </p>
        <p>Your submitted image:</p>
        <?php
        if (isset($userResponses['imagePath']) && file_exists($userResponses['imagePath'])) {
            echo '<img src="'.htmlspecialchars($userResponses['imagePath']).'" alt="User Submitted Image" />';
        } else {
            echo '<p>Image not available.</p>';
        }
        ?>
    </section>
</body>
</html>
