<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagLuxe - Admin Login</title>
    <?php include("head-section.php"); ?>
    <style>
        .container {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }

    </style>
</head>
<body>
    <h1 class="text-center my-5">BagLuxe</h1>
    <h2 class="text-center">Login into Administration</h2>
    <div class="underline"></div>
    <div class="container">
        <div>
            <?php if (isset($_GET['incorrect'])) { ?>
                <div class="alert alert-warning">
                    Incorrect Name or Password
                </div>
            <?php } ?>
        </div>
        <form action="login.php" method="post" class="border border-2 border-secondary rounded p-4 shadow">
            <div class="mb-3"> 
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="submit" value="Admin Login" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>