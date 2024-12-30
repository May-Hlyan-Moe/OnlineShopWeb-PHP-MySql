<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - New Category</title>
    <?php include("head-section.php"); ?>
</head>
<body>
    <h1 class="text-center my-4">BagLuxe</h1>
    <h2 class="text-center my-4">New Category</h2>
    <div class="underline"></div>
    <form action="cat-add.php" method="post" enctype="multipart/form-data" class="container">
        <div class="mb-3">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="photo">Photo</label>
            <input type="file" name="title_images" id="photo" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="submit" value="Add Category" class="btn btn-primary">
        </div>
    </form>
</body>
</html>