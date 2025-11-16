<?php
 session_start();
 session_destroy();
 unset($_SESSION['username']);
 session_start();
include "db_connection.php";

if(isset($_POST['submit_btn'])){

    $uname = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if ($uname != "" && $password != ""){

      if($uname == "admin" && $password == "123"){

        header('location:./admin.php');
      }

      else{
        $sql_query = "select count(*) as cntUser from users where name='".$uname."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);
       

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['username'] = $uname;
            
		header('location:./index.php');
        }
  }}
        else{
            
            
            echo "<div class='alert alert-success'>Invalid username and password.</div>";
        }

    
  

}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
<title>User Login</title>
<style>
 body{
    
    background: url('img/carousel-3.jpg')no-repeat ;
    background-size:cover;
    background-position: center;
	
  }
  .container{
	display:grid;
	width:300px;
    margin:auto;
	margin-top:15%;
    border:solid #fff 2px;
    /* background:#10a1a3; */
    background:rgba(1,1,1,0.7);
    border-radius:10px;
    /* opacity:0.8; */
  }
  #div_login{
    margin:auto;
    
  }
  #div_login h1{
    color:#fff;
    
	margin-bottom:15%;
    margin:auto;
    width:fit-content;
    /* margin:auto; */
  }
  #div_login .form-control{

    top:50px;
    /* padding:50px; */
    margin-left:auto;
    
    margin-right:auto;
    
    margin-top:30px;
    width:fit-content;

  }
  #div_login .form-btn{
    margin-left:auto;
    background-color:#10a1a3;
    margin-right:auto;
    border-radius:10px;
    margin-top:30px;
    width:fit-content;
  }
  p,a{
    
    color:#fff;
  }
</style>
</head>
<body>
    <div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Login</h1>
            <div  class="form-group">
                <input type="text" class="form-control"  id="username" name="username" placeholder="Username" required/>
            </div>
            <div  class="form-group">
                <input type="password" class="form-control"  id="password" name="password" placeholder="Password" required/>
            </div>
            <div class="form-btn">
                <input type="submit" class="btn " value="Submit" name="submit_btn" id="submit_btn" />
            </div> 
          
            
        </div>
    </form>
    
    <div><p>New user? <a href="registration.php">Register Here</a></p></div>
</div>
</body>
</html>