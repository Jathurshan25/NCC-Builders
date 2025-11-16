<?php
session_start();
if (isset($_SESSION["users"])) {
   header("login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
</head>
<body>
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
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $name = $_POST["name"];
           $email = $_POST["email"];
           $mobile = $_POST["mobile"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           

           $errors = array();
           
           if (empty($name) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($mobile)<10) {
            array_push($errors, "Mobile is not valid");
           }
           if (strlen($password)<5) {
            array_push($errors,"Password must be at least 5 characters long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "db_connection.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (name, email,mobile, password) VALUES ( ?, ?, ? ,?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssss",$name, $email, $mobile,$password);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <div id="div_login">
            <h1>Registration</h1>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="mobile" placeholder="Mobile:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn " value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
        </div></div>
    </div>
</body>
</html>