<?php
session_start();
$x= $_POST['getquestion'];
$y=$_SESSION["logid"];
$que;
$place;

$_SESSION["selected question"]=$x;
echo "<h5 style='color:yellow;'>username:".$y."</h5>";

$conn = new mysqli("localhost", "root", "","meghana");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from question where qno='$x'";
$sql2="select * from answers where qid='$x'";
$result=$conn->query($sql);
$res1=$conn->query($sql2);
if($result->num_rows)
{
   while($row=$result->fetch_assoc())
    {
     $que=$row['question'];
    echo'</br>';
    break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
        history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Can you solve this one?</title>
    <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap-grid.min.css">
    
     <?php
$profpic = "wolrdmap.PNG";
?>
     
   <style>
            
            body
            {
                
                background-image: url('<?php echo $profpic;?>');
                background-size: cover;
                
            }
            </style>
           
   
</head>
<body class="question-body">
<div class="container question-container">
    <div class="row">
        <div class="col"></div>
        <div  class="col-sm-12 col-md-8">
            <div style="margin-top: 50px;" class="card question-card">
                <div style="margin-top: 50px;" class="card-block question-block">
                   <div>
                       <?php
                      $sql2="select * from answers where qid='$x'";
                      $sql3="select * from question where qno='$x';";
                      $res5=$conn->query($sql3);
                      $res1=$conn->query($sql2);
                      if($res5->num_rows)
                      {
                          while($row4=$res5->fetch_assoc())
                          {
                              $place=$row4['place'];
                          }
                      }
                      if($res1->num_rows)
                      {
                         echo'<form action="checkans.php" method="POST">';
                         while($row2=$res1->fetch_assoc())
                         {
                            echo '<label for="question"> <font size="+2">';
                            echo $que;
                           echo '</font>';
                             echo '</label>';
                        echo '<br>';
                        echo '<label style="background-color:#d673b9;color: aquamarine;margin-left:10px;margin-right:10px;" class="btn btn-lg btn-secondary signin-button">';
                           
                        echo '<input type="radio" name="options" value="1" required> ';
                        echo $row2['option1'];
                        echo '</label>';
                        
                        echo '<label  class="btn btn-lg btn-secondary signin-button" style="background-color:#d673b9;color: aquamarine;margin-left:10px;margin-right:10px;">';
                        echo    '<input type="radio" name="options" value="2" required>';
                        echo $row2['option2'];
                        echo '</label>';
                        echo '<label style="background-color:#d673b9;color: aquamarine;margin-left:10px;margin-right:10px;" class="btn btn-lg btn-secondary signin-button">';
                        echo ' <input type="radio" name="options" value="3" required>';
                        echo $row2['option3'];
                        echo '</label>';
                        echo '<label  class="btn btn-lg btn-secondary signin-button" style="background-color:#d673b9;color: aquamarine;margin-left:10px;margin-right:10px;">';
                        echo   ' <input type="radio" name="options" value="4" required> ';
                        echo $row2['option4'];
                        echo'</label>';
                        echo '<br>';
                        echo '<br>'; 
                        echo '<button class="btn btn-lg btn-secondary question-btn" name="place" value='.$place.' style="margin-left: 200px;background-color:#1ae0c6;color:rgb(1, 7, 1)">Submit</button>';
                         break;
                    }
                         
                      }
                     ?>
                         
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>


                        
</body>
</html>
