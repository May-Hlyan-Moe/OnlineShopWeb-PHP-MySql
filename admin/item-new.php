<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - New Item</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <h1 class="text-center my-3">BagLuxe</h1>
    <h2 class="text-center my-3">New Item</h2>
    <div class="underline"></div>
    <form action="item-add.php" method="post" enctype="multipart/form-data" class="container">
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="brand">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="review">Review</label>
            <textarea name="review" id="review" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price">Price</label>
            <div class="input-group">
                <input type="text" name="price" id="price" class="form-control" required>
                <span class="input-group-text">.00 USD</span>
            </div>
            
        </div>
        <div class="mb-3">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="material">Material</label>
            <input type="text" name="material" id="material" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="width">Width</label>
            <div class="input-group">
                <input type="text" name="width" id="width" class="form-control" required>
                <span class="input-group-text">inches</span>
            </div> 
        </div>
        <div class="mb-3">
            <label for="height">height</label>
            <div class="input-group">
                <input type="text" name="height" id="height" class="form-control" required>
                <span class="input-group-text">inches</span>
            </div>
        </div>
        <div class="mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <?php
                    include("confs/config.php");
                    $result = mysqli_query($conn, "SELECT * FROM categories");
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="submit" value="Add Item" class="btn btn-primary">
        </div>
    </form>
</body>
</html>