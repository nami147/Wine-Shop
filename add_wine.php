<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");

    $stmt = $pdo->prepare('INSERT INTO wines (name, description, price, image) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $description, $price, $image]);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Wine - Wine Shop</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Add New Wine</h1>
    <form action="add_wine.php" method="post" enctype="multipart/form-data">
        <label for="name">Wine Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" required>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Add Wine</button>
    </form>
</body>
</html>