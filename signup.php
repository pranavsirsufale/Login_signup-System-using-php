<?php
$sta = false;
$dupkey = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
require "partials/_dbconnect.php";
$username = $_POST['username'];
$fcookies = $_POST['fcookies'];
$mchar = $_POST['mchar'];
$meal = $_POST['meal'];
// $password = $_POST['pass'];
$cpass = $_POST['cpass'];
$hash = password_hash($cpass, PASSWORD_DEFAULT);

// if($password == $cpass){
    try {  
        $query = "SELECT * from `users` WHERE '$username'=`username`,'$fcookies'=`cookies`,'$mchar'=`mchar`,'$meal'=`meal`;";

        $sql = "INSERT INTO `users`(`id`,`username`,`cookies`,`mchar`,`meal`,`pass`) VALUES( NULL ,'$username','$fcookies','$mchar','$meal','$hash');";
        $result = mysqli_query($conn, $sql);
        $sta = true;
     }  
       
     //catch exception  
     catch (Exception $e) {  
       $dupkey = " username already has taken someone else. please try another one!";
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

    <title>Signup</title>
</head>



<body>
<!-- start navbar -->
<?php require 'partials/_nav.php';

?>
<br>
<?php
if($sta == true){
    myMessage("successfully","Your account has been created successfully !");

}
if($dupkey){
    myMessage("Error",$dupkey,"danger");
}
function myMessage($sta,$message,$type = "success") {
    echo "<div style='height:60px; '>
       <div class='container col-md-6 alert alert-$type alert-dismissible fade show' role='alert'>
     <strong>$sta</strong>$message
     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>
   </div>";
   }
?>



    <div class="container col-md-6">
        <h1 class="text-center">signup to our weapplication</h1>

        <!-- form  -->
        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input type="text" required maxlength="15" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label" for="fcookies">your favorite cookies(भिस्कुट)</label>
                <input type="text" maxlength="15" class="form-control" id="fcookies" name="fcookies" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label" for="mchar">Who is your favorite Marvel character </label>
                <input type="text" maxlength="15" class="form-control" id="mchar" name="mchar" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label" for="meal">What did you eat this morning</label>
                <input type="text"  class="form-control" id="meal" name="meal" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Make sure enter the right information. this is a very confidential
                    information🤐🔐</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pass">Password</label>
                <input type="password" required maxlength="15" class="form-control" name="pass" id="pass">
            </div>
            <div class="mb-3">
                <label class="form-label" for="cpass">Confirm Password </label>
                <input type="password" required class="form-control" id="cpass" name="cpass">
                <div id="emailHelp"  maxlength="15" class="form-text">Make sure to type the same password</div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="login.php" class="link-info" >Already have and account?</a>
        </form>


    </div>

    <!-- Optional JavaScript; choose one of 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
         -->

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
</body>

</html>