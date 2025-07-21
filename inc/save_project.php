<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header('Location: ../public/admin.php');
  exit;
}
require_once '../inc/db.php';
$id = $_POST['id'] ?? null;
$titre = trim($_POST['titre'] ?? '');
$description = trim($_POST['description'] ?? '');
$lien = trim($_POST['lien'] ?? '');
$image = '';
if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
  $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  $image = uniqid('img_').'.'.$ext;
  move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/'.$image);
}
if ($id) {
  // Modification
  if ($image) {
    $stmt = $pdo->prepare('UPDATE portfolio SET titre=?, description=?, lien=?, image=? WHERE id=?');
    $stmt->execute([$titre, $description, $lien, $image, $id]);
  } else {
    $stmt = $pdo->prepare('UPDATE portfolio SET titre=?, description=?, lien=? WHERE id=?');
    $stmt->execute([$titre, $description, $lien, $id]);
  }
} else {
  // Ajout
  $stmt = $pdo->prepare('INSERT INTO portfolio (titre, description, lien, image) VALUES (?, ?, ?, ?)');
  $stmt->execute([$titre, $description, $lien, $image]);
}
header('Location: ../admin/dashboard.php');
exit;