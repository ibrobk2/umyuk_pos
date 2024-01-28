<?php
// Assuming $server is the database connection
include_once("../../connection/index.php");

include_once("../../auth/core.php");

$products = getAllProducts($server);
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
<a href="../" class="btn btn-primary">Back to Dashboard</a>
<div class="container mt-5">
    <h2>Manage Products</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SNO.</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Created On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sn = 1;
            foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo "2024".$product["product_id"]; ?></td>
                    <td><?php echo $product["product_name"]; ?></td>
                    <td><?php echo $product["product_category"]; ?></td>
                    <td><?php echo $product["price"]; ?></td>
                    <td><?php echo $product["quantity"]; ?></td>
                    <td><?php echo $product["quantity"]*$product["price"]; ?></td>
                    <td><?php echo $product["created_on"]; ?></td>
                    <td>
                        <a href="../add_product/?edit=<?php echo $product["product_id"]; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="delete_product_id" value="<?php echo $product["product_id"]; ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Delete?')" name="delete_product">Delete</button>
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