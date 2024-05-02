<?php

session_start();

require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Sanitize text inputs
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    // Hashing a password before storing it
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Example of storing $passwordHash in a database is omitted for brevity

    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Handle the picture upload



    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {

        $picture = $target_file;

        $sql = "INSERT INTO blog_entries (username, password, message, picture_filename) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters to the prepared statement
        // 's' specifies the parameter type, 's' for string
        $stmt->bind_param("ssss", $username, $passwordHash, $message, $picture);

        // Execute the statement
        $stmt->execute();

        // Retrieve the ID of the inserted row
        $last_id = $conn->insert_id;

        // Close the statement
        $stmt->close();

    }
    $_SESSION['userResponses'] = [
        'imagePath' => $picture,
        'username' => $username,
        'message' => $message,
    ];



}
header('location: thankYou.php');



