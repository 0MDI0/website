<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$passw = $_POST['passw'];

$conn = new mysqli('localhost','root','','shop');
if($conn->connect_error){
    die('Connection Failed  :  '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into register(firstname, lastname, email, passw)
    values(?, ?, ?, ?)");
    $stmt->bind_param("sssi",$firstname, $lastname, $email, $passw);
    $stmt->execute();
    echo "register success...";
    $stmt->close();
    $conn->close();
}

?>