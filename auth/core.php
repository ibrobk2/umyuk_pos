<?php
session_start();


// Database Connection
// include_once("../connection/index.php");


//Checking id User Login
if(!$_SESSION['data']){
    header("Location: ../");
    exit();
}


// Function to fetch all products from the database
function getAllProducts($server) {
    include_once("../../connection/index.php");
    $sql = "SELECT * FROM product";
    $result = $server->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to delete a product from the database
function deleteProduct($server, $productId) {
    include_once("../../connection/index.php");
    $sql = "DELETE FROM product WHERE product_id = ?";
    $stmt = $server->prepare($sql);
    $stmt->bind_param("i", $productId);

    return $stmt->execute();
}

// Check if delete button is clicked
if (isset($_POST["delete_product"])) {
    // include_once("../../connection/index.php");
    $deleteProductId = $_POST["delete_product_id"];

    // Delete product from the database
    if (deleteProduct($server, $deleteProductId)) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product.";
    }
}






?>