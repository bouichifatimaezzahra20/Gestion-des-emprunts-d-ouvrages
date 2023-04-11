<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
      defer></script>
   <link rel="stylesheet" href="style.css">
   <!-- <script src="login.js" defer></script> -->

   <title>Log in</title>
</head>

<body>
   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }
   ?>
   <form action="" method="post">
      <div class="d-flex justify-content-center align-items-center justify-content-around">
         <img src="images/log.png" class="vh-100" alt="logimg" class="logimg">
         <div class="d-flex flex-column">
            <h1 class="h1">Log In</h1>
            <div class="form">
               <label for="email">Email</label>
               <input class="form-control mb-4" type="email" name="email" id="email">
               <small></small>
            </div>
            <div class="form">
               <label for="pass">Password</label>
               <input type="password" class="form-control mb-4" name="password" id="pass">
               <small></small>
            </div>
            <input type="submit" name="submit" class="btn btn-primary mb-4" value="Log In"></input>
            <p>if you dont have an account you can </p><a href="Sign_up.php" class="text-decoration-none">register
               here!</a>
         </div>
   </form>
</body>

</html>
<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

   $email = $_POST['email'];
   $pass = md5($_POST['password']);

   $select_users = $pdo->prepare("SELECT * FROM `members` WHERE Email = :email AND Password = :password");
   $select_users->bindParam(':email', $email);
   $select_users->bindParam(':password', $pass);
   $select_users->execute();
   if ($select_users->rowCount() > 0) {

      $row = $select_users->fetch();

      if ($row['Admin'] == 1) {
         $_SESSION['Nickname'] = $row['Nickname'];
         header('Location: admin/admin_page.php');
      } elseif ($row['Admin'] == 0) {
         $_SESSION['Nickname'] = $row['Nickname'];
         header('Location: home.php');
      }
   } else {
      $message[] = 'incorrect email or password!';
   }

}

?>