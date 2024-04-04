<?php
    $servername='127.0.0.1';
    $username  = 'root';
    $password  = '';
    $database  = 'riaz_01';

    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn)
    {
       echo("Connection Failed " . mysqli_connect_error());
    }else{
       echo("Connection succefully to databas:  $database");
    }
    