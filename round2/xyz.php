<?php
session_start();
$y=$_SESSION["logid"];
 $bal;
 $bal1;
 $con;
 $status;
 $selcon=$_POST["country"];
 $_SESSION["country"]=$selcon;
 $conn = new mysqli("localhost", "root", "","meghana");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from question where place='$selcon' and status=0;";
$sql2="select * from login where uname='$y';";
$my="select * from countries where country='$selcon';";
$res2=$conn->query($my);
if($res2->num_rows)
{
    while($row3=$res2->fetch_assoc())
    {
      if($row3['status']==0)
      {
          $status=$row3['status']+2;
          $my2="update countries set status='$status' where country='$selcon';";
          $conn->query($my2);
          $bal1= -1500;
      }
    else {
        echo "<script>
    alert('Country is already bought');
    window.location.href='conquer.php';
    </script>";
      }
    }
}
$res1=$conn->query($sql2);
if($res1->num_rows)
{
   while($row1=$res1->fetch_assoc())
   {
      $bal=$row1['balance'];
      if($bal<1500)
      {
          echo "<script>
    alert('you dont have enough balance to buy the country');
    window.location.href='conquer.php';
    </script>";
      }else{
        $bal=$bal+$bal1;
        echo "<h5 style='color:yellow;'>Now your current balance is balance ".$bal."</h5>";
        echo "</br>";
        $sql3="update login set balance='$bal' where uname='$y';";
        $conn->query($sql3);
      }
      
   }
}
$res=$conn->query($sql);

if($res->num_rows==0)

 {
     
     $sql4="select * from login where uname='$y';";
     $res4=$conn->query($sql4);
     if($res4->num_rows)
     {
        while($row=$res4->fetch_assoc())
        {
         $con= $row['conwon']  ;
         
         echo"conwon".$con;
         $sql5="update login set conwon='$con' where uname='$y';";
         $conn->query($sql5);
        }
     }
 }

 ?>

 <!DOCTYPE html>
<html lang="en">
<head><script>
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solve it.!</title>
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
                            echo '</label><br>';
                    echo '             ';
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


