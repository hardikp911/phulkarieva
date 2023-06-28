<?php

include('../database/connection.php');

$user_data = unserialize($_POST['user_data']);
$cart_data = unserialize($_POST['cart_data']);
$invoiceNumber = $_POST['invoiceNumber'];


$user_data  = serialize($user_data);
$cart_data  = serialize($cart_data);
// print_r($invoiceNumber);
// die;



$sql = "INSERT INTO orders (invoice_id, user_data, cart_data ) VALUES ('$invoiceNumber', '$user_data', '$cart_data')";

if (mysqli_query($conn, $sql)) {
    print_r("yes done");
} else {
    // User registration failed
    // Handle the error or redirect to an error page
    echo "Error: " . mysqli_error($conn);
}



?>
