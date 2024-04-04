<?php

// Start or resume a session
session_start();

// Check if the session variable 'userResponses' is set
if (!isset($_SESSION['userResponses'])) {
    // If not set, display a message and terminate the script
    echo "No submission data found. Please submit the form";
    exit;
}

// Retrieve user responses stored in the session
$userResponses = $_SESSION['userResponses'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <!-- Ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Link to an external CSS file for styling -->
    <link rel="stylesheet" href="../css/thank.css">
</head>
<body>
    <!-- Display a thank you message -->
    <h1>Thank you for your Feedback</h1>
    <div>
        <!-- Display user information retrieved from session -->
        <p>Hello, <?php echo htmlspecialchars($userResponses['name']); ?></p>
        <p>Email: </br> <?php echo htmlspecialchars($userResponses['email']); ?></p>
        <p>Tel: </br> <?php echo htmlspecialchars($userResponses['tel']); ?></p>
        <p>Gender: </br> <?php echo htmlspecialchars($userResponses['gender']); ?></p>
        <p>Status: </br> <?php echo htmlspecialchars($userResponses['status']); ?></p>
        <!-- Use implode to display interests array as a string -->
        <p>Interest: </br> <?php echo htmlspecialchars(implode(" , </br>", $userResponses['interests'])); ?></p>
        <p>Major: </br> <?php echo htmlspecialchars($userResponses['major']); ?></p>
    </div>
</body>
</html>
