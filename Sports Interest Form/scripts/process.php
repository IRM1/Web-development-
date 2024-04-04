<?php

session_start();
require 'connection.php';


     
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $universityName = filter_input(INPUT_POST, 'universityName', FILTER_SANITIZE_STRING);
    $checkbox = isset ($_POST['interest']) ? $_POST['interest'] : [];

    $sql = "INSERT INTO textbox (name, email, university_name) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $universityName);
    $stmt->execute();
    $last_id = $conn->insert_id;
    $stmt->close();

    if (!empty($_POST['interest'])) {
        $checkbox1 = isset($checkbox[0]) ? $checkbox[0] : "Not Selected";
        $checkbox2 = isset($checkbox[1]) ? $checkbox[1] : "Not Selected";
        $checkbox3 = isset($checkbox[2]) ? $checkbox[2] : "Not Selected";
        $checkbox4 = isset($checkbox[3]) ? $checkbox[3] : "Not Selected";
    
        $sql = "INSERT INTO checkbox (form_entry_id, checkboxValue1, checkboxValue2, checkboxValue3, checkboxValue4) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $last_id, $checkbox1, $checkbox2, $checkbox3, $checkbox4);
        $stmt->execute();
        $stmt->close();
    }
        
}

$getname;
$getemail;
$getuniversity;
$getcheckbox1;
$getcheckbox2;
$getcheckbox3;
$getcheckbox4;

$sql = "SELECT id, name, email, university_name FROM textbox ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of the latest entry
    $row = $result->fetch_assoc();
    $getname = $row["name"];
    $getemail = $row["email"];
    $getuniversity = $row["university_name"];
}

$sql = "SELECT id, checkboxValue1, checkboxValue2, checkboxValue3, checkboxValue4 FROM checkbox ORDER BY form_entry_id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of the latest entry
    $row = $result->fetch_assoc();
    $getcheckbox1 = $row["checkboxValue1"];
    $getcheckbox2 = $row["checkboxValue2"];
    $getcheckbox3 = $row["checkboxValue3"];
    $getcheckbox4 = $row["checkboxValue4"];
}
  $_SESSION['userResponses']=[
    'name'=>$getname,
    'email'=>$getemail,
    'universityName'=>$getuniversity,
    'check1'=>$getcheckbox1,
    'check2'=>$getcheckbox2,
    'check3'=>$getcheckbox3,
    'check4'=>$getcheckbox4,
  ];
  header('location: thankYou.php');