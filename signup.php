<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $name = htmlspecialchars(trim($_POST['Name']));
      $surname = htmlspecialchars(trim($_POST['Surname']));
      $email = filter_var(trim($_POST['E-mail']), FILTER_VALIDATE_EMAIL);
      $password = trim($_POST['Password']);

    if (!$email) {
        die("Invalid email format.");
    }

    if (strlen($password) < 6) {
        die("Password must be at least 6 characters long.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $surname, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Signup successful!</p>";
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
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo"> <img src="eagle.png" alt="logo"> Fast Lane Albania</div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html">Inventory</a></li>
                <li><a href="index.html">Sell Your Car</a></li>
                <li><a href="index.html">SignUp</a></li>
                <li><a href="index.html">Login</a></li>
                
            </ul>
        </nav>
    </header>
    
   
    <form action="signup.php" class="add-car" method="POST">
        <h2>Signup</h2>
        <form id="add-car-form">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" id="Name" name="Name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="Surname">Surname</label>
                <input type="text" id="Surname" name="Surname" placeholder="Surname" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="E-mail" name="E-mail" placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="password" id="Password" name="Password" placeholder="Password" required>

            </div>
            <button type="submit" class="btn">Signup</button>
        </form>
    </section>
 
    
    <br><footer><p>Contact us:<br>+38344556677 <br> fastlanealbania@hotmail.com</p></footer>

</body>
</html>