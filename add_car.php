<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $brand = htmlspecialchars(trim($_POST['Brand']));
    $model = htmlspecialchars(trim($_POST['Model']));
    $year = htmlspecialchars(trim($_POST['Year']));
    $price = htmlspecialchars(trim($_POST['Price']));

    $stmt = $conn->prepare("INSERT INTO cars (brand, model, year, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $brand, $model, $year, $price);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Car added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo"> <img src="eagle.png" alt="logo"> Fast Lane Albania</div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="inventory.html">Inventory</a></li>
                <li><a href="sell_car.html">Sell Your Car</a></li>
                <li><a href="signup.html">SignUp</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </nav>
    </header>
    
    <form action="add_car.php" class="add-car" method="POST" enctype="multipart/form-data">
        <h2>Add Car</h2>
        <div class="form-group">
            <label for="car-title">Title</label>
            <input type="text" id="car-title" name="car-title" placeholder="Title" required>
        </div>
        <div class="form-group">
            <label for="car-price">Price</label>
            <input type="text" id="car-price" name="car-price" placeholder="Price" required>
        </div>
        <div class="form-group">
            <label for="car-horsepower">Horsepower</label>
            <input type="text" id="car-horsepower" name="car-horsepower" placeholder="Horsepower" required>
        </div>
        <div class="form-group">
            <label for="car-image">Image</label>
            <input type="file" id="car-image" name="car-image" required>
        </div>
        <button type="submit" class="btn">Add Car</button>
    </form>
    
    <footer>
        <p>Contact us:<br>+38344556677 <br> fastlanealbania@hotmail.com</p>
    </footer>
</body>
</html>
