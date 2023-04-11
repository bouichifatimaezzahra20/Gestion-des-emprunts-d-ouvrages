<?php
session_start();
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
include "../config.php";
$user_reservation = "SELECT * FROM `reservation`";
$result_reservation = $pdo->query($user_reservation)->fetchAll(PDO::FETCH_ASSOC)
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
  <link rel="stylesheet" href="../home.css">
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

<body>
  <nav class="navbar navbar-expand-lg">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="admin_page.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reservations_table.php">Reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="loans-table.php">Borowings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="userprofil.php">Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <img src="../images/home.png" alt="background">
  <h1 style="position: absolute; top: 20%; left: 6%">Buy <span class="c1">Your</span><br> Favourite <span
      class="c1">Book</span><br> From <span class="c1">Here</span> </h1>
  <div class="container-fluid">
    <form class="d-flex container position-absolute top-50" style="position:absolute; left:5%; width: 30%;"
      method="post">
      <input class="form-control" type="search" placeholder="Book title" name="sershe_input" aria-label="Search">
      <button type="submit" class="btn btn-primary" name="search">Search</button>
    </form>
  </div>
  <table class="table text-center mb-5 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Username</th>
        <th>book</th>
        <th>Reservation date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($result_reservation as $reservation) {
        // echo "<pre>";
        // var_dump($reservation);
        // echo "</pre>";
        $id_book = $reservation['Collection_Code'];
        $id_memebr = $reservation['Nickname'];
        $date = $reservation['Reservation_Date'];
        $id_reservation = $reservation['Reservation_Code'];

        $book = "SELECT * FROM collection WHERE Collection_Code = '$id_book'";
        $book = $pdo->query($book);
        $resulte = $book->Fetch(PDO::FETCH_ASSOC);

        ?>
        <tr>
          <td>
            <?php echo $reservation['Nickname'] ?>
          </td>
          <td>
            <?php echo $resulte['Title'] ?>
          </td>
          <td>
            <?php echo $reservation['Reservation_Date'] ?>
          </td>
          <td class="align-middle">
            <form action="Valid.php" method="post">
              <input type="hidden" value="<?php echo $id_reservation ?>" name="valid_reseravtion">
              <input type="hidden" value="<?php echo $id_memebr ?>" name="valid_member">
              <input type="hidden" value="<?php echo $id_book ?>" name="valid_book">
              <button class="btn_valid" type="submit" name="valid_reservation">Valid</button>
            </form>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>

</body>

</html>