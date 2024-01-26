<?php
// Assuming $server is the database connection
include_once("../../connection/index.php");

// Function to fetch all products from the database
function getAllUsers($server) {
    include_once("../../connection/index.php");
    $sql = "SELECT * FROM users";
    $result = $server->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to delete a product from the database
function deleteUser($server, $id) {
    include_once("../../connection/index.php");
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $server->prepare($sql);
    $stmt->bind_param("i", $productId);

    return $stmt->execute();
}

// Check if delete button is clicked
if (isset($_POST["delete_user"])) {
    $deleteProductId = $_POST["user_id"];

    // Delete product from the database
    if (deleteProduct($server, $deleteProductId)) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product.";
    }
}

$products = getAllUsers($server);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Manage Users</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product["user_id"]; ?></td>
                    <td><?php echo $product["full_name"]; ?></td>
                    <td><?php echo $product["username"]; ?></td>
                    <td><?php echo $product["email"]; ?></td>
                    <td><?php echo $product["role"]; ?></td>
                    <td><?php echo $product["status"]; ?></td>
                    <td><?php echo $product["created_on"]; ?></td>
                    <td>
                        <a href="../add_product/?edit=<?php echo $product["product_id"]; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="delete_product_id" value="<?php echo $product["product_id"]; ?>">
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