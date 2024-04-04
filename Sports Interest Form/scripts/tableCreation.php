<?php

require 'connection.php';

  
$tbl1 = "CREATE TABLE IF NOT EXISTS textbox(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    university_name VARCHAR(255) NOT NULL

)";

$tbl2 = "CREATE TABLE IF NOT EXISTS checkbox(
    id INT AUTO_INCREMENT PRIMARY KEY,
    form_entry_id INT,
    checkboxValue1 VARCHAR(255) NOT NULL,
    checkboxValue2 VARCHAR(255) NOT NULL,
    checkboxValue3 VARCHAR(255) NOT NULL,
    checkboxValue4 VARCHAR(255) NOT NULL,
    FOREIGN KEY (form_entry_id) REFERENCES textbox(id)
)";

if (mysqli_query($conn, $tbl1)) {
    echo "Table textbox created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

if (mysqli_query($conn, $tbl2)) {
    echo "Table checkbox created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}