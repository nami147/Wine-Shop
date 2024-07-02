<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM wines WHERE id = ?');
$stmt->execute([$id]);

header('Location: index.php');
?>