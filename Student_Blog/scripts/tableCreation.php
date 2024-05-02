<?php

require 'connection.php';

  
$tbl1 = "CREATE TABLE IF NOT EXISTS blog_entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,  -- Store hashed passwords, not plain text
    message TEXT NOT NULL,
    picture_filename VARCHAR(255)    -- Stores the filename of the uploaded picture
)";


if (mysqli_query($conn, $tbl1   )) {
    echo "Table textbox created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

