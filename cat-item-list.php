<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("admin/confs/config.php");

if(isset($_GET['id'])) {
    $category_id = $_GET['id'];
    $category_query = mysqli_query($conn, "SELECT * FROM categories WHERE id='$category_id'");
    $category_result = mysqli_fetch_assoc($category_query);
    $category_name = $category_result['name'];

    $result = mysqli_query($conn, "SELECT items.*, categories.name AS category_name FROM items LEFT JOIN categories ON items.category_id = categories.id WHERE categories.name = '$category_name' ORDER BY items.reached_date DESC");
} else {
    $category_name = "Category not Found";
    $result = null;
}

$row_count = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe</title>
    <?php include("head-section.php"); ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <style>
        @media(max-width:600px) {
            ul {
                margin-left: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="dropdown position-fixed badge" id="dropdown-menu">
        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-bars"></i></button>

        <ul class="dropdown-menu">
            <li class="dropdown-item">
                <a href="index.php" class="text-decoration-none text-black"><strong>Shop by Category</strong></a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-item">
                <a href="view-cart001.php" class="btn btn-primary">
                    View Cart
                </a>
            </li>
            <li class="dropdown-divider"></li>
            <?php 
                $category = mysqli_query($conn, "SELECT * FROM categories");
                while($cat_row = mysqli_fetch_assoc($category)) { 
            ?>
            <li class="dropdown-item">
                <a href="cat-item-list.php?id=<?php echo $cat_row['id']; ?>" class="text-decoration-none text-black"><?php echo $cat_row['name']; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>

    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3"><?php echo $category_name ?></h2>
    <div class="underline"></div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3 badge">
                <div class="position-fixed" id="menu">
                <a href="view-cart001.php" class="btn btn-primary">
                    View Cart
                </a>
                <div class="card my-4">
                    <div class="card-header">
                        <a href="index.php" class="text-decoration-none text-black">
                            <strong>Shop by Category</strong>
                        </a> 
                    </div>
                        <ul class="list-group list-group-flush">
                            <?php 
                                $category = mysqli_query($conn, "SELECT * FROM categories");
                                while($cat_row = mysqli_fetch_assoc($category)) { 
                            ?>
                                <li class="list-group-item">
                                    <a href="cat-item-list.php?id=<?php echo $cat_row['id']; ?>" class="text-decoration-none text-black"><?php echo $cat_row['name']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>   
                </div>
                </div>    
            </div>
            <div class="col-sm-9">
                <ul>
                    <?php
                    if($result) {
                    while($item_row = mysqli_fetch_assoc($result)) { 
                        $row_count++ ;
                        ?>
                    <li>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="admin/images/<?php echo $item_row['photo'] ?>" alt="item-image" class="img-fluid">
                            </div>
                            <div class="col-md-6 mt-3">
                                <h3>
                                    <?php echo $item_row['title'] ?> from
                                    <?php echo $item_row['brand']; ?>
                                </h3>
                                <h4><?php echo $item_row['price'] ?>.00 USD</h4>
                                <div class="card mt-3">
                                    <div class="card-header">
                                        Description
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">material: <?php echo $item_row['material']; ?></li>
                                            <li class="list-group-item">width: <?php echo $item_row['width']; ?> inches</li>
                                            <li class="list-group-item">height: <?php echo $item_row['height']; ?> inches</li>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <form id="add-to-cart-form-<?php echo $item_row['id']; ?>" action="#" method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item_row['id']; ?>">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" id="quantity" min="1" class="form-control" required>
                                    <br>
                                    <input type="submit" value="Add to cart" class="btn btn-secondary mb-3">
                                </form>
                            </div>
                            <br>
                            <?php if ($row_count < mysqli_num_rows($result)) { ?>
                                <hr>
                            <?php } ?>
                            <br>
                        </div>
                        <?php }
                            } else {
                            echo "<li>No items Found</li>";
                            }
                        ?>
                    </li>
                </ul> 
            </div>
        </div>    
    </div>  
    <?php include("footer.php"); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            var forms = document.querySelectorAll('form[id^="add-to-cart-form-"]');
            forms.forEach(function(form) {
                form.addEventListener("submit", function(event){
                    event.preventDefault();

                    var formData = new FormData(this);

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "selected-orders.php", true);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            alert("Item add to cart successfully000");
                        } else {
                            alert("Error adding item to cart");
                        }
                    };
                    xhr.onerror = function() {
                        alert("Error adding to cart");
                    };
                    xhr.send(formData);
                });
            });
        });

        function adjustMenu() {
            var menu = document.getElementById('menu');
            var dropdownMenu = document.getElementById('dropdown-menu');
            
            if (window.innerWidth < 576) {
                menu.classList.add('d-none');
                dropdownMenu.classList.remove('d-none');
            } else {
                menu.classList.remove('d-none');
                dropdownMenu.classList.add('d-none');
            }
        };

        adjustMenu();

        setInterval(adjustMenu, 1000);

        window.addEventListener('resize', adjustMenu);
    </script>
</body>
</html>
