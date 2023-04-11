<?php
require "config.php";
$id_reservation = $_GET['cancel'];

// Delete the corresponding rows from the `borrowings` table first
$delete_borrowings = "DELETE FROM borrowings WHERE Reservation_Code = '$id_reservation'";
$stmt_borrowings = $pdo->query($delete_borrowings);

// Then delete the row from the `reservation` table
$delete_reservation = "DELETE FROM reservation WHERE Reservation_Code = '$id_reservation'";
$stmt_reservation = $pdo->query($delete_reservation);

header('Location: reservations_table.php');
?>