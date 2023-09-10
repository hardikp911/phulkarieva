<?php
// Assuming you have a database connection established
include('../database/connection.php');

if (isset($_POST['product_id'])) {

    
    $product_id = $_POST['product_id'];
    $product_image_path = $_POST['product_image_path'];

    // Perform the deletion in the database (you should include error handling)
    $query = "DELETE FROM products WHERE product_id = ?";
    $stmt = mysqli_prepare($your_db_connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $product_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // Delete the associated image file (you should include error handling)
        unlink($product_image_path);
        
        // Return a success message
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Deletion failed']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Missing product_id']);
}
?>
