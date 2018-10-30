<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/styles-front.css">
    <script type="text/javascript"></script>
    <style>
      .style-container{
        position: absolute;
        top: 50%; left:50%;
        transform: translateX(-50%) translateY(-50%);
      }
    </style>
  </head>
  <body class="bodylogin">
    <div class="container style-container">
      <div class="row row-styles form_login">
      <?php
        @$login = $_GET['opc'];
        switch ($login) {
          case 'login':
            include 'login/signin.php';
            break;
          case 'register':
            include 'login/signup.php';
            break;
          default:
            include 'login/signin.php';
            break;
        }
       ?>
      </div>
      
      </div>
    </div>
    <script type="text/javascript" src="vendor/bootstrap/bootstrap.js"></script>
  </body>
</html>
