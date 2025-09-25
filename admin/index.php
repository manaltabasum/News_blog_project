
<?php 
ob_start();
  include 'inc/db.php';
   session_start();  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  

</head>


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input name="login" type="submit" class="btn btn-primary btn-block" value="Sign in">
          </div>
          <!-- /.col -->
        </div>
      </form>

<?php
  if (isset($_POST['login'])){
    $email = mysqli_real_escape_string($db , $_POST['email']);
    $password = mysqli_real_escape_string($db , $_POST['password']);
    $hassed = sha1($password);
    $sql = "SELECT * FROM users WHERE email='$email'";
    $connection = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($connection)){

      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_name'] = $row['user_name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['status'] = $row['status'];
      $_SESSION['image'] = $row['image'];


      if ($email == $_SESSION['email'] && $hassed == $_SESSION['password'] && $role == $_SESSION['1']){
        header("Location:dashboard.php");
      }
      if ($email == $_SESSION['email'] && $hassed == $_SESSION['password'] && $role == $_SESSION['2']){
        header("Location:dashboard2.php");
      }

      elseif($email == $_SESSION['email'] && $hassed != $_SESSION['password'] && $_SESSION['status']){
        header("Location:index.php");


      }

      else{
        header("Location:index.php");
      }


    }
  }

?>





      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<?php
ob_end_flush();
?>
</body>
</html>
