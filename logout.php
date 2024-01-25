
  <?php require 'partials/_nav.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){

  }
  session_unset();
  session_destroy();
  header('location:login.php');
  exit;
  ?>
