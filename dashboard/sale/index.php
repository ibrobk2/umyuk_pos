<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sales Form</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Sales Form</h2>
    
    <form action="" method="get" >
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="product">Product</label>
                <select class="form-control" id="product" name="product">
                    <option selected>Select Product</option>
                    <?php
                         include_once("../../auth/core.php"); 
                         include_once("../../connection/index.php");

                         $products = getAllProducts($server);
                        foreach($products as $product):

                    ?>
                    <option value="<?=$product['product_name'];?>"><?=$product['product_name'];?></option>

                    <?php endforeach; ?>
                   
                    <!-- Add more products as needed -->
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="customer">Customer</label>
                <input type="text" class="form-control" id="customer" name="customer" placeholder="Enter customer name">
            </div>
            <div class="form-group col-md-6">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
        </div>
        
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Enter any additional notes"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
