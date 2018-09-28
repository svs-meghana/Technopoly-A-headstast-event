<?php
session_start();
$y=$_SESSION["logid"];
 $bal;
 $con;
 $status;
 $selcon=$_SESSION["country"];
 echo($selcon);
$conn = new mysqli("localhost", "root", "","meghana");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from question where place='$selcon' and status=0;";
$sql2="select * from login where uname='$y';";
$my="select * from countries where country='$selcon';";
$res2=$conn->query($my);
$res=$conn->query($sql);
echo($res->num_rows);
if($res->num_rows==0)
{
     
     $sql4="select * from login where uname='$y';";
     $res4=$conn->query($sql4);
     if($res4->num_rows)
     {
        while($row=$res4->fetch_assoc())
        {
         $con= $row['conwon']  ;
         $con=$con+1;
         echo"conwon".$con;
         $sql5="update login set conwon='$con' where uname='$y';";
         $conn->query($sql5);
          echo "<script>
alert('You conquered it!.');
window.location.href='conquer.php';
</script>";
        }
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
    <title>Login to Technopoly</title>
    <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap-grid.min.css">
    <?php
$profpic = "wolrdmap.PNG";
?>
   <style>
            
            body
            {
                
                background-image: url('<?php echo $profpic;?>');
                
            }
            </style>
            <script>
            history.pushState(null,null,location.href);
            windows.onpopstate=function(){
                history.go(1);
                
            };
            </script>
            
            
</head>
<body class="question-body">
<div class="container question-container">
    <div class="row">
        <div class="col"></div>
        <div class="col-sm-12 col-md-8">
            <div class="card question-card" style="margin-top:50px;width:120%;height: 120%;margin-right: 100px;">
                <div class="card-block question-block" >
                    <?php
                    $sql = "select * from question where place='$selcon' and status=0;";
                    $res=$conn->query($sql);
                    if($res->num_rows>0)
                    {
                        echo'<form action="getquestion.php" method="POST">'; 
                        while($row=$res->fetch_assoc())
                        {
                    echo '<label for="question" > <font size="+1">'.$row['question'];
                            echo '</font>';
                            echo '</label>';
                    echo '<br>';
                    echo '<button type=submit name="getquestion" value="'.$row['qno'].'" class="btn btn-secondary question-btn " style="margin-left: 100px;background-color:#1ae0c6;color:rgb(1, 7, 1)">Solve It</button>';

                    echo '<br>';
                    echo '<br>';
                        }
                    }
                    
                     ?> 
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>

                        
</body>
</html>


