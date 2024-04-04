<?php

// Define a class named Student to represent student information
class Student
{
    // Declare private properties for the Student class
    private $name;
    private $email;
    private $phoneNumber;
    private $gender;
    private $status;
    private $major;
    private $interests;

    // Constructor method to initialize a new instance of the Student class
    public function __construct($name = "", $email = "", $phoneNumber = "", $gender = "", $status = "", $interests = "", $major = "")
    {
        // Initialize each property with the values passed to the constructor
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->gender = $gender;
        $this->status = $status;
        $this->major = $major;
        $this->interests = $interests;
    }

    // Getter methods to return the value of each private property
    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getInterests()
    {
        return $this->interests;
    }

    public function getMajor()
    {
        return $this->major;
    }

    // Setter methods to update the value of each private property
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setInterests($interests)
    {
        $this->interests = $interests;
    }

    public function setMajor($major)
    {
        $this->major = $major;
    }

    // Method to display student information
    function display()
    {
        // Output each property value, with interests joined by a comma and line break
        echo $this->name . "</br>";
        echo $this->email . "</br>";
        echo $this->phoneNumber . "</br>";
        echo $this->gender . "</br>";
        echo $this->status . "</br>";
        echo $this->major . "</br>";
        echo implode(" , </br>", $this->interests);
    }
}
