<?php
session_start();
include "../config.php";
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
    <div class="container-fluid">
     
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
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#add-modal">add book</a>
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
            <img class="" src="<?php echo $book['Cover_Image'] ?>" alt="book_imag">
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
                    data-bookid="<?php echo $book['Collection_Code'] ?>">Edit</button>
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
            <img class="" src="<?php echo $book['Cover_Image'] ?>" alt="book_imag">
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
                    data-bookid="<?php echo $book['Collection_Code'] ?>">Edit</button>
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
          <li class="page-item"><a class="page-link" href="<?php echo "admin_page.php?pageId=" . $i ?>"><?php echo $i; ?></a>
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
                <form action="edit.php" method="get">
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
  <!-- add modal -->
  <div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content text-center">
        <div class="modal-header text-center">
          <h1 class="modal-title fs-5" id="exampleModalLabel">add book</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="information">
            <form action="add.php" method="get">
              <div class="d-flex">
                <div class="w-100 p-5">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">title</label>
                    <input type="text" name="title" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">author</label>
                    <input type="text" name="author" class="form-control" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">image</label>
                    <input type="file" class="form-control" name="image" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">state</label>
                    <input type="text" class="form-control" name="state" required="">
                  </div>
                </div>
                <div class="w-100 p-5">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">publishing date</label>
                    <input type="date" class="form-control" name="publishing_date" required="">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">pages</label>
                    <input type="number" class="form-control" name="pages" required="">
                  </div>
                  <div class=" mb-3">
                    <label for="exampleInputEmail1" class="form-label">type</label>
                    <input type="text" class="form-control" name="type" required="">
                  </div>
                </div>
              </div>
              <button class="btn btn-primary mb-3" type="submit" name="update_prof">add book</button>
          </div>
          </form>
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