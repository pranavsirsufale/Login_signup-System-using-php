<?php
if(isset($_SESSION["loggedin"]) && $_SESSION['loggedin'] == true){
$loggedin = true;
} else{
  $loggedin = false;
}

echo '<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
        <a class="navbar-brand" >iSecure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>';
        if($loggedin == false){
        echo '<li class="nav-item">
          <a class="nav-link" href="signup.php">signup</a>
        </li>';
      }
        if($loggedin == true){
          echo '
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
      }
       
      echo '</ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';

?>