<?php
// Assuming $conn is the database connection
include("../../connection/index.php");

$product_name = "";
$product_category = "";
$price = "";
$quantity = "";
$update = false;

// Function to add a product to the database
function addProduct($conn, $name, $category, $price, $quantity) {
    $sql = "INSERT INTO product (`product_name`,`product_category`, `price`, `quantity`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $name, $category, $price, $quantity);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Check if form is submitted
if (isset($_POST['add_btn'])) {
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_quantity = $_POST["product_quantity"];
    $product_category = $_POST['product_category'];

    // Validate input if needed

    // Add product to the database
    if (addProduct($server, $product_name, $product_category, $product_price, $product_quantity)){
        echo "Product added successfully!";
    } else {
        echo "Error adding product.";
    }
}




// Edit Product Section
if(isset($_GET['edit'])){
    include("../../connection/index.php");
    $id = $_GET['edit'];
    $update = true;

    // Get product details Function
// Function to fetch all products from the database
function getProductDetails($server, $id) {
    include("../../connection/index.php");
   
    $sql = "SELECT * FROM product WHERE product_id=?";
    $stmt = $server->prepare($sql);
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
    $res = $stmt->get_result();

    $count = $res->num_rows;

    if ($count > 0) {
        return $res->fetch_assoc();
    } else {
        return [];
    }
}
// End of product details fxn

    $product = getProductDetails($server, $id);
    $product_name = $product['product_name'];
    $product_category = $product['product_category'];
    $price = $product['price'];
    $quantity = $product['quantity'];

}



// UPDATE SECTION

if(isset($_POST['update_btn'])){
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_quantity = $_POST["product_quantity"];
    $product_category = $_POST['product_category'];
    $id = $_POST['hidden'];

    // Validate input if needed
    $sql = "UPDATE product SET product_name=?, product_category=?, price=?, quantity=? WHERE product_id=?";
    $stmt3 = $server->prepare($sql);
    $stmt3->bind_param('ssiii',$product_name, $product_category, $price, $quantity, $id);
    if($stmt3->execute()){
    header("Location: ../manage_product");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5 w-25">
    <?php 
    if($update==true): ?>
    <h2  class="text-success">Update Product</h2>
    <?php else: ?>
    <h2  class="text-success">Add Product</h2>
    <?php endif; ?>
    <form method="post" action="index.php">
        <div class="form-group">
        <input type="hidden" name="hidden" value="<?=$id; ?>">
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?=$product_name; ?>" required>
        </div>

        <div class="form-group">
            <label for="product_category">Product Category:</label>
            <input type="text" class="form-control" id="product_category" name="product_category" value="<?=$product_category; ?>" required>
        </div>

        <div class="form-group">
            <label for="product_price">Product Price:</label>
            <input type="number" step="0.01" class="form-control" id="product_price" name="product_price" value="<?=$price; ?>" required>
        </div>
        <div class="form-group">
            <label for="product_quantity">Product Quantity:</label>
            <input type="number" class="form-control" id="product_quantity" name="product_quantity" value="<?=$quantity; ?>" required>
        </div>
        <?php if($update==true): ?>
        <button type="submit" class="btn btn-success w-100" name="update_btn">Update Product</button>
        <?php else: ?>
        <button type="submit" class="btn btn-success w-100" name="add_btn">Add Product</button>
        <?php endif; ?>
        <a href="../" class="btn btn-primary btn-md mt-3 w-100">Back to Dashboard</a>

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
