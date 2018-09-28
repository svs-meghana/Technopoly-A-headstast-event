<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$y=$_SESSION["logid"];
$x=$_SESSION["selected question"];
$z=$_POST["options"];
$points;
$place;
$conn = new mysqli("localhost", "root", "","meghana");
$place = $_POST["place"];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from question where qno='$x'";

$result=$conn->query($sql);

if($result->num_rows)
{
    
   
   
     
    while($row=$result->fetch_assoc())
    {
      
    if($row['correctans']==$z)
    {
        
        $sql2="update question set status=2 where qno='$x';";
        $conn->query($sql2);
        $sql3="select * from login where uname='$y'; ";
        $res1=$conn->query($sql3);
        if($res1->num_rows)
        {
        while($row1=$res1->fetch_assoc())
       {
          $points=$row1['points'];
          $points=$points+1;
     
      $sql4="update login set points='$points' where uname='$y';";
      $conn->query($sql4);
       }
       }
         echo "<script>
alert('Correct answer, go ahead and conquer it!.');
window.location.href='xyz1.php';
</script>";
    }
    else 
     {
        
        $sql2="update question set status=0 where place='$place';";
        $conn->query($sql2);
        $sql6="update countries set status=0 where country='$place';";
        $conn->query($sql6);
         
        echo "<script>
alert('Oh, no!! Wrong answer, you lost it.');
window.location.href='conquer.php';
</script>";
    }
    }
}