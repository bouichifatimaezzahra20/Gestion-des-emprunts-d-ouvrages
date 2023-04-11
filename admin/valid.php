<?php
require "../config.php";

$id_reservation = $_POST['valid_reseravtion'];
$id_member = $_POST['valid_member'];
$id_book = $_POST['valid_book'];

// Check if the Reservation_Code already exists in the borrowings table
$check_query = "SELECT * FROM borrowings WHERE Reservation_Code = '$id_reservation'";
$check_result = $pdo->query($check_query)->fetch();

if (!$check_result) {
  // Reservation_Code does not exist in borrowings table, insert a new record
  $add_loan = "INSERT INTO borrowings (`Borrowing_Code`, `Borrowing_Date`, `Borrowing_Return_Date`, `Collection_Code`, `Nickname`, `Reservation_Code`) 
  VALUES (NULL, NOW(), NULL, '$id_book', '$id_member','$id_reservation')";
  $loaned = $pdo->query($add_loan);
  header('Location: reservations_table.php');
} else {
  // Reservation_Code already exists in borrowings table, do not insert a new record
  // You can display an error message to the user or redirect them to a different page
  echo "Error: Reservation already loaned.";
}
?>