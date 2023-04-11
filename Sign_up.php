<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="style.css">
    <script src="validation.js" defer></script>

    <title>Register</title>
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
    <form method="post">
        <div class="d-flex form-container">
            <img src="images/log.png" alt="logimg" class="logimg">
            <div class="d-flex flex-column">
                <h1 class="h1">Creat Account</h1>
                <div class="d-flex gap-5">
                    <div class="form">
                        <label for="firstname">Name</label>
                        <input type="text" class="form-control mb-4" name="name" id="firstname">
                        <small></small>
                    </div>
                    <div class="form">
                        <label for="nickname">NickName</label>
                        <input type="text" class="form-control mb-4" name="nickname" id="nickname">
                        <small></small>
                    </div>
                </div>
                <div class="form">
                    <label for="adress">Adress</label>
                    <input type="text" class="form-control mb-4" name="adress" id="adress">
                    <small></small>
                </div>
                <div class="form">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mb-4" name="email" id="email">
                    <small></small>
                </div>
                <div class="form">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control mb-4" name="phone" id="phone">
                    <small></small>
                </div>
                <div class="d-flex  gap-5">
                    <div class="form">
                        <label for="cin">C.I.N</label>
                        <input type="text" class="form-control mb-4" name="cin" id="cin">
                        <small></small>
                    </div>
                    <div class="form">
                        <label for="datebirth">Date Of Birth</label>
                        <input type="date" class="form-control mb-4" name="datebirth" id="datebirth">
                        <small></small>
                    </div>
                    <div class="form">
                        <label for="user_type">User type</label>
                        <select class="form-select" name="user_type">
                            <option value="Etudiant">Etudiant</option>
                            <option value="Fonctionnaire">Fonctionnaire</option>
                            <option value="Employé">Employé</option>
                            <option value="Femme au foyer">Femme au foyer</option>
                        </select>
                    </div>
                </div>
                <div class="form">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control mb-4" name="password" id="pass">
                    <small></small>
                </div>
                <div class="form">
                    <label for="cpass"> confirme Password</label>
                    <input type="password" class="form-control mb-4" name="cpassword" id="cpass">
                    <small></small>
                </div>
                <input type="submit" name="submit" class="btn btn-primary sign" value="Register now"></input>
                <p>Already have an account? <a href="login_page.php" class="text-decoration-none">Log in!</a></p>

            </div>
        </div>
    </form>
</body>

</html>
<?php

function check_role($val)
{
    if (strpos($val, "admin") == 0 && strlen($val) == 10) {
        return true;
    } else {
        return false;
    }
}

include 'config.php';
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $nickname = $_POST['nickname'];
    $cin = $_POST['cin'];
    $phone = $_POST['phone'];
    $datebirth = $_POST['datebirth'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    $adress = $_POST['adress'];
    $role = check_role($nickname);
    $entered_password = $_POST['password'];
    $stored_password = // retrieve hashed password from database
    
    
    
    
    
    $stmt = $pdo->prepare("SELECT * FROM `members` WHERE Email = :email AND Password = :password");
    $stmt->execute(array('email' => $email, 'password' => $pass));
    if ($stmt->rowCount() > 0) {
        $message[] = 'user already exists!';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm password not matched!';
        } else {
            $stmt = $pdo->prepare("INSERT INTO `members`(`Name`, `Password`, `Admin`, `Address`, `Email`, `Phone`, `CIN`, `Occupation`, `Penalty_Count`, `Birth_Date`) VALUES (:name, :password, :role,:adress,:email, :phone,:cin, :occopation, :penality,:datebirth)");

            $stmt->execute(array('name' => $name, 'password' => $pass, 'role' => $role, 'adress' => $adress, 'email' => $email, 'phone' => $phone, 'cin' => $cin, 'occopation' => $user_type,'penality' => 0, 'datebirth' => $datebirth));
        }
    }
}

?>