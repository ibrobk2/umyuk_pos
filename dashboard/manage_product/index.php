<?php
// Assuming $conn is the database connection
include_once("../../connection/index.php");

// Function to fetch all products from the database
function getAllProducts($conn) {
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to delete a product from the database
function deleteProduct($conn, $productId) {
    $sql = "DELETE FROM product WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);

    return $stmt->execute();
}

// Check if delete button is clicked
if (isset($_POST["delete_product"])) {
    $deleteProductId = $_POST["delete_product_id"];

    // Delete product from the database
    if (deleteProduct($conn, $deleteProductId)) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product.";
    }
}

$products = getAllProducts($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Manage Products</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product["id"]; ?></td>
                    <td><?php echo $product["product_name"]; ?></td>
                    <td><?php echo $product["product_category"]; ?></td>
                    <td><?php echo $product["price"]; ?></td>
                    <td><?php echo $product["quantity"]; ?></td>
                    <td><?php echo $product["created_on"]; ?></td>
                    <td>
                        <a href="edit_product.php?id=<?php echo $product["id"]; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="delete_product_id" value="<?php echo $product["id"]; ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
