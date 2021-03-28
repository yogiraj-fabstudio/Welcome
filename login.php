<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit']))
{ 

    $username = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO users (username, password)
VALUES ('$username', '$pass')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if(isset($_POST['login']))
{
    $username= $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * from users WHERE username='$username' and password='$pass'";
        
    $result = $conn->query($sql);
    // var_dump($result);
        if($result->num_rows != 0) 
        {
          echo "Login successfully";
        } else {
          echo "uNAUTHORIZED users";
        }
}


$conn->close();

?>