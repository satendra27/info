<?php
$name = $_POST['name'];
$gf = $_POST['gf'];
$number = $_POST['number'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$conn = new mysqli('localhost:3306','root','','info');
if($conn->connect_error){
    die('Connection Failed:'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("INSERT INTO info(name,gf,number,email,gender,city)
    values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss",$name,$gf,$number,$email,$gender,$city);

    // $stmt = $conn->prepare("INSERT INTO information(name, email, message) VALUES (:name, :email, :message)");
    //     $stmt->bindParam(':name', $name);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->bindParam(':message', $message);

    $stmt->execute();
    $stmt->get_result();
    echo "Registration Successfully...";
    $stmt->close();
    $conn->close();
}
?>
