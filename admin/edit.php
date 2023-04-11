<?php
require "../config.php";
// Get the item ID from the POST data
$item_id = $_GET['input'];
$value = $_GET['condition'];
$stmt = $pdo->query("UPDATE `collection` SET `State` = '$value' WHERE `Collection_Code` = $item_id");
$stmt->execute();
header('Location: admin_page.php');
?>