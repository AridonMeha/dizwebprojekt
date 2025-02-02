<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["car-image"])) {
    $title = $_POST['car-title'];
    $price = $_POST['car-price'];
    $horsepower = $_POST['car-horsepower'];
    $image_path = "uploads/" . basename($_FILES["car-image"]["name"]);

    if (move_uploaded_file($_FILES["car-image"]["tmp_name"], $image_path)) {
        $sql = "INSERT INTO cars (title, price, horsepower, image_path) VALUES ('$title', '$price', '$horsepower', '$image_path')";

        if ($conn->query($sql) === TRUE) {
            echo "Car added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }

    $conn->close();
}
?>
