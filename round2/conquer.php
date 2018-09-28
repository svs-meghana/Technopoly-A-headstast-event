<?php

session_start();
$y=$_SESSION["logid"];
 $bal;
 $con;
 $name;
 $status;
$conn = new mysqli("localhost", "root", "","meghana");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql2="select * from login where uname='$y';";

$res1=$conn->query($sql2);
if($res1->num_rows)
{
   while($row1=$res1->fetch_assoc())
   {
       $name = $row1['uname'];
      $bal=$row1['balance'];
      echo "<h5 style='color:red;'>Welcome: ".$name." "."</h5>";
      echo "<h5 style='color:red;'>Your balance is: ".$bal."</h5>";
      $con=$row1['conwon'];
      echo "<h5 style='color:red;'>Number of countries conquered is : ".$con."</h5><br>";
      
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
    <title>Conquer World</title>
    <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="conquer.css">
    
</head>
<body class="login-body">
    <div class="container signin-container">
		<div class="row">
			<div class="col"></div>
			<div class="col-sm-12 col-md-8">
				<div class="card signin-card">
					<div class="card-block">
                        <h5>README:</h5>
                        <label for="">Each country will cost you 1500 points and conquering them is not easy, if you can solve all questions of that country correctly then you will conquer it.
Remember you have to buy that country again to conquer it, if any one of the answers goes wrong.

                        </label>
                                            <form action="xyz.php" method="POST">
                           <button type="submit"  name="country" value="india" class="btn btn-lg signin-button" style="margin-top:5px">Conquer India <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                        <button type="submit"  name="country" value="egypt" class="btn btn-lg signin-button" style="margin-top:5px">Conquer Egypt <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                           <button type="submit" name="country" value="canada"  class="btn btn-lg signin-button" style="margin-top:5px">Conquer Canada
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                           <button type="submit" name="country" value="america" class="btn btn-lg signin-button"  style="margin-top:5px">Conquer america
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                           <button type="submit" name="country" value="pakistan" class="btn btn-lg signin-button" style="margin-top:5px">Conquer Pakistan
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                           <button type="submit" name="country" value="bangladesh" class="btn btn-lg signin-button" style="margin-top:5px">Conquer Bangladesh
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                           <button type="submit" name="country" value="nepal" class="btn btn-lg signin-button" style="margin-top:5px">Conquer Nepal
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                           <button type="submit" name="country" value="bhutan" class="btn btn-lg signin-button" style="margin-top:5px">Conquer Bhutan
                            <span style="font-size:100%;color:red;">&starf;</span>
                            
                        </button>
                        <button type="submit"  name="country" value="france" class="btn btn-lg signin-button" style="margin-top:5px">Conquer France <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        
                        </button>

                        <button type="submit"  name="country" value="germany" class="btn btn-lg signin-button" style="margin-top:5px">Conquer germany <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                           <button type="submit" name="country" value="russia" class="btn btn-lg signin-button" style="margin-top:5px">Conquer Russia
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                           <button type="submit" name="country" value="china" class="btn btn-lg signin-button" style="margin-top:5px">Conquer China
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>
                           <button type="submit" name="country" value="japan" class="btn btn-lg signin-button" style="margin-top:5px">Conquer Japan
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>

                        <button type="submit"  name="country" value="brazil" class="btn btn-lg signin-button" style="margin-top:5px">Conquer Brazil <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>

                        <button type="submit"  name="country" value="peru" class="btn btn-lg signin-button" style="margin-top:5px">Conquer Peru <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                            <span style="font-size:100%;color:red;">&starf;</span>
                        </button>

                        

                        
                           </form>
                    </div>
				</div>
			</div>
			<div class="col"></div>
		</div>
    </div>
    <div class="container signin-container">
            <div class="row">
                <div class="col"></div>
                <div class="col-sm-12 col-md-8">
                    <div class="card signin-card">
                        <div class="card-block">
                                <div id='xhr'  class="signin-button" style="width:100%;background-color:rgb(35, 215, 221);color:rgb(218, 57, 137);margin-left:100px;margin-top: 10px;max-width: 250px;">

                                </div>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    
    
            
    
</body>
</html>