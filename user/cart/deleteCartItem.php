<?php
    include('../../database/connection.php');

    // Get the values from the query parameters
    $user_id = $_GET['user_id'];
    $product_id = $_GET['product_id'];
    $product_size = $_GET['sproduct_size'];

    // Delete the entry from the cartdata table
    $deleteQuery = "DELETE FROM cartdata WHERE user_id = '$user_id' AND product_id = '$product_id' AND product_size = '$product_size'";
    if(mysqli_query($conn, $deleteQuery)){
  
            echo 1;
        }else{
            echo 0;
        }

    

?>
