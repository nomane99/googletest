<?php
session_start();
$admin_password = 'admin2024'; // À remplacer par un hashé en prod
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    if ($password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: ../admin/dashboard.php');
        exit;
    } else {
        header('Location: ../public/admin.php?error=1');
        exit;
    }
} else {
    header('Location: ../public/admin.php');
    exit;
}