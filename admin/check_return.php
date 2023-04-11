<?php
require "../config.php";
$id_loan = $_POST['valid_loan'];
$id_member = $_POST['valid_member'];
$return_loan = "UPDATE `borrowings` SET `Borrowing_Return_Date` = NOW() WHERE `borrowings`.`Borrowing_Code` = $id_loan";
$return_loan = $pdo->query($return_loan);
$check_date = "SELECT * FROM borrowings WHERE `Borrowing_Code` = $id_loan";
$check_date = $pdo->query($check_date);
$check_date = $check_date->fetch(PDO::FETCH_ASSOC);
$days = (strtotime($check_date['Borrowing_Return_Date']) - strtotime($check_date['Borrowing_Date'])) / (60 * 60 * 24);
$interval = floor($days);
if ($interval > 15) {
    $penalty = "UPDATE `members` SET `Penalty_Count` = Penalty_Count+1 WHERE `Nickname` = $id_member";
    $penalty = $pdo->query($penalty);
    $result = "SELECT Penalty_Count FROM members WHERE `Nickname` = $id_member";
    $result = $pdo->query($result);
    $result = $result->fetch(PDO::FETCH_ASSOC);
}
$id_reservation = $check_date['Reservation_Code'];
$delete_loan = "DELETE FROM borrowings WHERE `Reservation_Code` = $id_reservation";
$delete_reservation = "DELETE FROM reservation WHERE `Reservation_Code` = $id_reservation";
$delete_loan = $pdo->query($delete_loan);
$delete_reservation = $pdo->query($delete_reservation);
header('Location: loans-table.php');
?>