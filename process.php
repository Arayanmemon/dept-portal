<?php
session_start(); 
$conn = new mysqli("localhost", "root", "" , "dept-portal");

$uname = $_POST['email'];
$psw = $_POST['psw'];

if (empty(trim($uname)) || empty(trim($psw))) {
    
     header("location:index.php?error=4");
          
}

$sql = "SELECT id, name, password, email FROM teachers WHERE email ='$uname' AND password='$psw' ";
$result = $conn->query($sql);

if($row = $result->fetch_assoc()) {
    
    $_SESSION['login'] = $row["id"];
     header("location:home.php?");  
  
}
else{
    header("location:index.php?error=1");
}
?>