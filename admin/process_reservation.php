<?php
require "../config.php";
// Get the item ID from the POST data
$item_id = $_POST['id'];
$stmt = $pdo->prepare('SELECT * FROM `collection` WHERE `Collection_Code` = :item_id');
$stmt->bindParam(':item_id', $item_id);
$stmt->execute();
// Retrieve the item details as an associative array
$reserve = $stmt->fetch(PDO::FETCH_ASSOC);
// Close the database connection
$pdo = null;

// Check if the item was found in the database
if (!$reserve) {
    echo '<p>Item not found.</p>';
} else {

    $response = array(
        "details" => '<h5 class="card-title text-black">Book title : ' . $reserve['Title'] . '</h5>'
        . '<input name="condition" value="'.$reserve['State'].'">' 
        . '<p class="card-text text-black">Written by : ' . $reserve['Author_Name'] . '</p>'
        . '<p class="card-text text-black">Published in : ' . $reserve['Edition_Date'] . '</p>'
        . '<p class="card-text text-black">Number of pages : ' . $reserve['size'] . '</p>'
        . '<p class="card-text text-black">Type : ' . $reserve['type'] . '</p>',
        "image" =>  $reserve['Cover_Image'],
        "input" => $reserve['Collection_Code']
    );

    // Encode the response as JSON and output it
    echo json_encode($response);
}
?>