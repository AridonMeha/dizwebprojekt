<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST['E-mail']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['Password']);

    if (!$email || !$password) {
        echo "<p style='color:red;'>Please fill in both fields.</p>";
    } else {
        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                echo "<p style='color:green;'>Login successful!</p>";
            } else {
                echo "<p style='color:red;'>Invalid password.</p>";
            }
        } else {
            echo "<p style='color:red;'>No account found with that email.</p>";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
    
    <section class="login">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="E-mail" name="E-mail" placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" id="Password" name="Password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </section>
    
    <br><footer><p>Contact us:<br>+38344556677 <br> fastlanealbania@hotmail.com</p></footer>
</body>
</html>
