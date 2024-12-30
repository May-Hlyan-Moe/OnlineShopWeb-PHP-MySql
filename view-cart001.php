<?php

    session_start();
    if(!isset($_SESSION['cart'])){
        header("location:view-cart-not-found.php");
    }
    include("admin/confs/config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Your Cart</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">Your Cart</h2>
    <div class="underline"></div>
    <div class="container mt-4">
        <a href="javascript:history.go(-1)" class="btn btn-success">Continue Shopping</a>
        <a href="clear-cart.php" onclick="return confirm('Are you committed to deleting ?')" class="btn btn-danger">Clear Cart</a>
        <table class="table table-striped table-bordered my-4">
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Price</th>
            </tr>
            <?php
                $total = 0;
                foreach($_SESSION['cart'] as $id => $qty){
                    $result = mysqli_query($conn, "SELECT title,price FROM items WHERE id='$id'");
                    $row = mysqli_fetch_assoc($result);
                    $total += $row['price']*$qty;
            ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['price']*$qty ?></td>
            </tr>            
            <?php } ?>
            <tr>
                <td colspan="3" align="right">Total :</td>
                <td><?php echo $total; ?>.00 USD</td>
            </tr>
        </table>
        <h3 class="text-center my-3">Order Now</h3>
        <div class="underline"></div>
        <form action="submit-order.php" method="post" class="my-4">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" required>
                <label for="name">Your Name</label>
            </div> 
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="email" name="email" required>
                <label for="email">Your email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="phone" name="phone" required>
                <label for="phone">Phone No</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="visa-card" name="visa" required>
                <label for="visa-card">Visa Card</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="address" name="address" required>
                <label for="address">Your Address</label>
            </div>
            <div class="my-3">
                <input type="submit" value="Submit Order" class="btn btn-secondary">
            </div>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>