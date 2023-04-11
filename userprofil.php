<?php
session_start();
include 'config.php';
$Nickname = $_SESSION['Nickname'];
$user = "SELECT * FROM members WHERE Nickname = $Nickname";
$user_info = $pdo->query($user)->fetch(PDO::FETCH_ASSOC);
?>
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
  <!--FONT AWESOME-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--GOOGLE FONTS-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <title>Home</title>
</head>

<body class="text-center">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
     
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reservations_table.php">My reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="loans-table.php">My borowings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="userprofil.php">Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Display user's information using HTML code -->
  <div class="w-100 d-flex justify-content-center align-items-center">
    <div class="p-4 rounded" style=" background-color: #FAFAEE;">
      <div class="d-flex gap-5">
        <div>
          <p class="card-text">User name: <span class="fw-bold">
              <?php echo $user_info["Name"]; ?>
            </span></p>
          <p class="card-text">Phone number: <span class="fw-bold">
              <?php echo $user_info["Phone"];
              ; ?>
            </span></p>
          <p class="card-text">Email: <span class="fw-bold">
              <?php echo $user_info["Email"]; ?>
            </span></p>
          <p class="card-text">Occupation : <span class="fw-bold">
              <?php echo $user_info["Occupation"];
              ; ?>
            </span></p>
        </div>
        <div>
          <p class="card-text">Penalty Count: <span class="fw-bold">
              <?php echo $user_info["Penalty_Count"]; ?>
            </span></p>
          <p class="card-text">Birth Date: <span class="fw-bold">
              <?php echo $user_info["Birth_Date"];
              ; ?>
            </span></p>
          <p class="card-text">CIN: <span class="fw-bold">
              <?php echo $user_info["CIN"]; ?>
            </span></p>
          <p class="card-text">Nickname : <span class="fw-bold">
              <?php echo $user_info["Nickname"];
              ; ?>
            </span></p>
        </div>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
  <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#logout">Log out</button>
  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit User Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="editprofilinfo.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="firstName" class="form-label">Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName"
                value="<?php echo $user_info["Name"]; ?>">
            </div>
            <div class="mb-3">
              <label for="phoneNumber" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                value="<?php echo $user_info["Phone"]; ?>">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email"
                value="<?php echo $user_info["Email"]; ?>">
            </div>
            <div class="mb-3">
              <label for="currentPassword" class="form-label">Current Password</label>
              <input type="password" class="form-control" id="currentPassword" name="currentPassword">
            </div>
            <div class="mb-3">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" id="newPassword" name="newPassword">
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
            </div>
            <input type="hidden" name="userId" value="<?php echo $user_id; ?>">
            <button type="submit" class="btn btn-primary" name="editUser">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div><!-- Modal -->
  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Log out</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to log out
          <form action="logout.php">
            <button type="submit" class="btn btn-danger">Sure</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</body>

</html>