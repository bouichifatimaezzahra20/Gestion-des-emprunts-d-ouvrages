<?php
session_start();
include "config.php";
if (isset($_POST['search'])) {
  $search_param = array();
  if (!empty($_POST['sershe_input'])) {
    $search_param[] = "Title LIKE '%{$_POST['sershe_input']}%'";
  }

  $filter = "SELECT * FROM collection";
  $filter .= " WHERE " . implode($search_param);
  $filter = $pdo->query($filter);
  $result = $filter->fetchAll(PDO::FETCH_ASSOC);
} else {
  $pageId;

  if (isset($_GET['pageId'])) {
    $pageId = $_GET['pageId'];
  } else {
    $pageId = 1;
  }

  $endIndex = $pageId * 6;
  $StartIndex = $endIndex - 6;

  $sql = ("SELECT * FROM `collection` LIMIT 6 OFFSET $StartIndex");

  $page = 'SELECT * FROM collection';

  $books_lentgh = $pdo->query($page)->rowCount();

  $pagesNum = 0;

  if (($books_lentgh % 6) == 0) {

    $pagesNum = $books_lentgh / 6;
  } else {
    $pagesNum = ceil($books_lentgh / 6);
  }

  $books = $pdo->query($sql);
  $books = $books->fetchAll(PDO::FETCH_ASSOC);
}
if (isset($_GET['confirmation'])) {
  $id = $_GET['input'];
  $Nickname = $_SESSION['Nickname'];

  $check_member_reservation = "SELECT * FROM reservation WHERE reservation.Nickname = '$Nickname'";
  $check_member_loan = "SELECT * FROM borrowings WHERE borrowings.Nickname = '$Nickname'";

  $check_book_reseravation = "SELECT * FROM reservation WHERE reservation.Collection_Code = '$id'";
  $check_book_loan = "SELECT * FROM borrowings WHERE borrowings.Collection_Code = '$id'";

  $reservation = $pdo->query($check_member_reservation);
  $loan = $pdo->query($check_member_loan);
  $num_reservation = $reservation->rowCount();
  $num_loan = $loan->rowCount();
  $member_total = $num_reservation + $num_loan;
  $book_reservation = $pdo->query($check_book_reseravation);
  $book_loan = $pdo->query($check_book_loan);
  $book_reserved = $book_reservation->rowCount();
  $book_loaned = $book_loan->rowCount();
  $book_total = $book_reserved + $book_loaned;
  if ($member_total < 3 && $book_total == 0) {
    $sql = "INSERT INTO `reservation`(`Reservation_Date`, `Reservation_Expiration_Date`, `Collection_Code`, `Nickname`) VALUES (NOW(),NOW(),'$id','$Nickname')";
    $stmt = $pdo->query($sql);
    $success = "Thank you for your reservation request! We're happy to inform you that your booking has been tentatively reserved.  we kindly remind you that you have 24 hours to confirm this reservation before it expires.the next step is the loan process.";
    // header("Location: user.php");
  } elseif ($member_total == 3) {
    $no_more = "Sorry but it's look like you have reache the maximume of books you can borrow and reserve";
    // header("Location: user.php");
  } elseif ($book_total == 1) {
    $book_is_reservred = "sorry but that book is alredy reserved";
    // header("Location: user.php");
  }
}

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
  <link rel="stylesheet" href="home.css">
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
  <img src="images/home.png" alt="background">
  <h1 style="position: absolute; top: 20%; left: 6%">Buy <span class="c1">Your</span><br> Favourite <span
      class="c1">Book</span><br> From <span class="c1">Here</span> </h1>
  <div class="container-fluid">
    <form class="d-flex container position-absolute top-50" style="position:absolute; left:5%; width: 30%;" method="post">
      <input class="form-control" type="search" placeholder="Book title" name="sershe_input" aria-label="Search">
      <button type="submit" class="btn btn-primary" name="search">Search</button>
    </form>
  </div>
  <?php
  if (isset($success)) {
    ?>
    <div class="alert alert-success text-center" role="alert">
      <?php echo $success ?>
    </div>
    <?php
  } elseif (isset($no_more)) {
    ?>
    <div class="alert alert-danger text-center" role="alert">
      <?php echo $no_more ?>
    </div>
    <?php
  } elseif (isset($book_is_reservred)) {
    ?>
    <div class="alert alert-danger text-center" role="alert">
      <?php echo $book_is_reservred ?>
    </div>
    <?php
  }
  ?>
  <div class="featurebook">
    <h2>NEW <span class="c1">PRODUCTS</span></h2>
    <p>On sait depuis longtemps que travailler avec du texte
      lisible et contenant du</p>
  </div>
  <?php
  if (isset($_POST['search'])) {
    ?>
    <div class="main d-flex justify-content-center gap-3 mb-5">
      <?php
      foreach ($result as $book) {
        ?>
        <div class="card">
          <div class="card-image">
            <img class="" src="images/<?php echo $book['Cover_Image'] ?>" alt="book_imag">
          </div>
          <div class="card-content">
            <div class="card-text">
              <div class="card-title">
                <?php echo $book['Title'] ?>
              </div>
              <div class="card-subtitle">
                <?php echo $book['Author_Name'] ?>
              </div>
              <div class="card-sentence">
                <?php echo $book['Status'] ?>
                <br>
                <?php echo $book['State'] ?>
              </div>
              <div class="card-buttons">
                <form id="reserve" action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $book['Collection_Code'] ?>">
                  <button type="submit" name="Reserve" class="card-button"
                    data-bookid="<?php echo $book['Collection_Code'] ?>">Reserve</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php

  } else {
    ?>
    <div class="main d-flex justify-content-center gap-3 mb-5">
      <?php
      foreach ($books as $book) {
        ?>
        <div class="card">
          <div class="card-image">
            <img class="" src="images/<?php echo $book['Cover_Image'] ?>" alt="book_imag">
          </div>
          <div class="card-content">
            <div class="card-text">
              <div class="card-title">
                <?php echo $book['Title'] ?>
              </div>
              <div class="card-subtitle">
                <?php echo $book['Author_Name'] ?>
              </div>
              <div class="card-sentence">
                <?php echo $book['Status'] ?>
                <br>
                <?php echo $book['State'] ?>
              </div>
              <div class="card-buttons">
                <form id="reserve" action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $book['Collection_Code'] ?>">
                  <button type="submit" name="Reserve" class="card-button"
                    data-bookid="<?php echo $book['Collection_Code'] ?>">Reserve</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php }
  } ?>
  </div>
  <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
    <nav class="mt-5 mb-5 " aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $pagesNum; $i++) { ?>
          <li class="page-item"><a class="page-link" href="<?php echo "home.php?pageId=" . $i ?>"><?php echo $i; ?></a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  <?php }
  ?>
  <!-- modal reservations -->
  <div class="modal fade" id="reservation-modal" tabindex="-1" aria-labelledby="reservation" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="test">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="" alt="book image" id="book-image" class="img-fluid rounded-start">
                <!-- <p class="text-danger">NB* : every reservation last for 24H </p> -->
              </div>
              <div class="col-md-8">
                <form action="" method="get">
                  <div class="test-body p-5">
                    loading...
                  </div>
                  <input type="hidden" id="input" name="input">
                  <button type="submit" name="confirmation" class="btn btn-outline-success">Confirm</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
      
  <script>
    $(document).on('click', '.card-button', function () {
      event.preventDefault();
      var bookid = $(this).data('bookid');
      $.ajax({
        url: 'process_reservation.php',
        type: 'POST',
        data: { id: bookid },
        dataType: 'json',
        success: function (response) {
          $('#reservation-modal .test-body').html(response.details);
          $('#reservation-modal #book-image').attr('src', response.image);
          $('#reservation-modal #input').val(response.input);
          $('#reservation-modal').modal('show');
        },
        error: function (xhr, status, error) {
          console.log('Error:', error);
          console.log('status:', status);
          console.log('xhr:', xhr);
        }
      });
    });
  </script>
</body>

</html>