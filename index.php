<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['car-title']);
    $price = floatval($_POST['car-price']);
    $horsepower = intval($_POST['car-horsepower']);

    if (isset($_FILES['car-image']) && $_FILES['car-image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["car-image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["car-image"]["tmp_name"]);
        if ($check === false) {
            echo "<p>File is not an image.</p>";
            exit;
        }

        if ($_FILES["car-image"]["size"] > 5000000) {
            echo "<p>File is too large. Maximum size is 5MB.</p>";
            exit;
        }

        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            echo "<p>Only JPG, JPEG, PNG, and GIF files are allowed.</p>";
            exit;
        }

        if (move_uploaded_file($_FILES["car-image"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO cars (title, price, horsepower, image_path) VALUES (:title, :price, :horsepower, :image_path)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':horsepower', $horsepower);
            $stmt->bindParam(':image_path', $target_file);

            if ($stmt->execute()) {
                echo "<p>Car added successfully!</p>";
            } else {
                echo "<p>Error adding car.</p>";
            }
        } else {
            echo "<p>Error uploading image.</p>";
        }
    } else {
        echo "<p>No image uploaded.</p>";
    }
}

$stmt = $conn->query("SELECT * FROM cars");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>