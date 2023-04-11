<?php
include "../config.php";
$title = $_GET['title'];
$author = $_GET['author'];
$image = $_GET['image'];
$state = $_GET['state'];
$publishing_date = $_GET['publishing_date'];
$date_of_purchase = 'NOW()';
$pages = $_GET['pages'];
$type = $_GET['type'];

$sql = "INSERT INTO `collection`(`Title`, `Author_Name`, `Cover_Image`, `State`, `Edition_Date`, `Buy_Date`, `Status`, `type`, `size`) 
VALUES ('$title', '$author', 'images/$image', '$state', '$publishing_date', $date_of_purchase, 'Available','$type','$pages')";

$pdo->exec($sql);
header('Location: admin_page.php');
?>