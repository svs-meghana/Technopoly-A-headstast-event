<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
 $x=$_POST["logid"];
 $y=$_POST["password"];

$conn = new mysqli("localhost", "root", "","meghana");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select * from login where uname='$x';";
$result=$conn->query($sql);
if($result->num_rows)
{  
$pass=$result->fetch_assoc();
if($y==$pass['password'])
{
    $_SESSION["logid"]=$x;
    
    header("location:conquer.php");
}
 else 
     {
        echo "<script>
        alert('enter correct password!');
        window.location.href='index.html';
        </script>";
}
}
else
{
    echo "<script>
    alert('Invalid loginId');
    window.location.href='index.html';
    </script>";
}

?>
