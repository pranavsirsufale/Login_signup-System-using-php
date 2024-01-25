<?php
$sta = false;
$showErro = false;
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
require "partials/_dbconnect.php";
$username = $_POST['username'];
$password = $_POST['pass'];
// $hash = password_hash($password, PASSWORD_DEFAULT);
// $fcookies = $_POST['fcookies'];
// $mchar = $_POST['mchar'];
// $meal = $_POST['meal'];
// $cpass = $_POST['cpass'];
// if($password == $cpass){

    try{
$query = "SELECT * from `users` WHERE `username`='$username';";

// $sql = "INSERT INTO `users`(`id`,`username`,`cookies`,`mchar`,`meal`,`pass`) VALUES( NULL ,'$username','$fcookies','$mchar','$meal','$cpass');";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
if($num != 0){
    while($row = mysqli_fetch_assoc($result)){
        if(password_verify($password, $row["pass"])){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
        }else{
            $showErro = "Invalid Credintinals ";
        }
    }
    
}else{
    $showErro = "Invalid Credintinals ";
}
    

}catch(mysqli_sql_exception $e){
    
    echo  " hey";
}


}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>



<body>
<!-- start navbar -->
<?php require 'partials/_nav.php';

?>
<br>
<?php
if($login == true){
    myMessage('successfully!','You are logged in successfully !');
}
if($showErro){
    myMessage("Error","Invalid Creadenatial","danger");
}
function myMessage($sta,$message,$class="success") {
    echo "<div style='height:60px; '>
       <div class='container col-md-6 alert alert-".$class." alert-dismissible fade show' role='alert'>
     <strong>$sta</strong>$message
     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>
   </div>";
   }
?>



    <div class="container col-md-6">
        <h1 class="text-center">signup to our weapplication</h1>

        <!-- form  -->
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input type="text" required class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pass">Password</label>
                <input type="password" required class="form-control" name="pass" id="pass">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            
            <a href="signup.php" id="noaccount" class="link-info">Create an account</a>
        </form>


    </div>

    <!-- Optional JavaScript; choose one of 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
         -->

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
</body>

</html>