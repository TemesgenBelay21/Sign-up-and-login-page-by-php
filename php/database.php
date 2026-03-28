<?php
$connection = mysqli_connect("localhost","root","","db_signup");
if(!$connection) {
    die("connection failed " .mysqli_error($connection));
}

$sql1 = "create database IF NOT EXISTS db_signup";

if(!mysqli_query($connection, $sql1)) {
    die("failed to create the database " . mysqli_error($connection));
}

$sql2 = "CREATE TABLE IF NOT EXISTS students(
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    email VARCHAR(50),
    sex TEXT(10)
)";
if(!mysqli_query($connection, $sql2)) {
    die("failed to create the table " . mysqli_error($connection));
}


$sql3 = "insert into students (firstname, lastname, email, sex) values(?,?,?,?)";
$stmt = mysqli_prepare($connection, $sql3);
if(!$stmt) {
    die("failed to prepare the statement " . mysqli_error($connection));
}
$stmt->bind_param("ssss", $firstname, $lastname, $email, $sex);
$firstname = "teme";
$lastname = "belay";
$email = "temebelay@gmail.com";
$sex = "Male";

$stmt->execute();

$firstname = "almi";
$lastname = "gizaw";
$email = "almigizaw@gmail.com";
$sex = "Female";    
$stmt->execute();


$name = "";
$password = "";

if(isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    $sql4 = "select * from students where firstname ='".$name."' limit 1";
    $result = mysqli_query($connection, $sql4);
    
    if(empty($name)) {
        echo "username is required";
    } else if(mysqli_num_rows($result) == 1) {
       header("location: welcome.php");
    }else {
        echo "wrong username or password";
    }
}

?>