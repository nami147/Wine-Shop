<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM wines WHERE id = ?');
$stmt->execute([$id]);
$wine = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");
    } else {
        $image = $wine['image'];
    }

    $stmt = $pdo->prepare('UPDATE wines SET name = ?, description = ?, price = ?, image = ? WHERE id = ?');
    $stmt->execute([$name, $description, $price, $image, $id]);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Wine - Wine Shop</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Edit Wine</h1>
    <form action="edit_wine.php?id=<?php echo $wine['id']; ?>" method="post" enctype="multipart/form-data">
        <label for="name">Wine Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $wine['name']; ?>" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $wine['description']; ?></textarea>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?php echo $wine['price']; ?>" required>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <button type="submit">Update Wine</button>
    </form>
</body>
</html>