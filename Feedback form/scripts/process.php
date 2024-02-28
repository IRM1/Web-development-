<?php


include 'student.php';
session_start();

function validateInput($data)
{
    $errors = [];
    // validating name, phone, email
    if (empty($data['name'])) {
        $errors[] = "Name is required.";
    }
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email is required.";
    }
    if (empty($data['phoneNumber'])) {
        $errors[] = "Phone Number is required.";
    }
    if (!isset($data['gender'])) {
        $errors[] = "Gender is required.";
    }
    // validate gender
    if (!isset($data['status'])) {
        $errors[] = "Status is required.";
    }
    if (!isset($data['major'])) {
        $errors[] = "Major is required.";
    }
    if (!isset($data['interests'])) {
        $errors[] = "Interests are required required.";
        return ($errors);
    }

    return ($errors);

}

$errors = validateInput($_POST);


if (!empty($errors)) {
    echo "Please fill in all the required fields<br />" . implode("<br />", $errors);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student = new Student($_POST['name'], $_POST['email'], $_POST['phoneNumber'], $_POST['gender'], $_POST['status'], $_POST['interests'], $_POST['major']);
    $student->setName(htmlspecialchars(filter_var($_POST['name'])));
    $student->setEmail(htmlspecialchars(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)));
    $student->setPhoneNumber(htmlspecialchars(filter_var($_POST['phoneNumber'])));
    $student->setGender(htmlspecialchars(filter_var($_POST['gender'])));
    $student->setStatus(htmlspecialchars(filter_var($_POST['status'])));
    $student->setMajor(htmlspecialchars(filter_var($_POST['major'])));


    $student->display();

    $_SESSION['userResponses'] = [
        'name' => $student->getName(),
        'email' => $student->getEmail(),
        'tel' => $student->getPhoneNumber(),
        'gender' => $student->getGender(),
        'status' => $student->getStatus(),
        'interests' => $student->getInterests(),
        'major' => $student->getMajor(),


    ];



}
header('location: thankYou.php');
