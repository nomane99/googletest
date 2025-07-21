<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header('Location: ../public/admin.php');
  exit;
}
require_once '../inc/db.php';
// Gestion suppression
if (isset($_GET['delete'])) {
  $id = (int)$_GET['delete'];
  $stmt = $pdo->prepare('DELETE FROM portfolio WHERE id = ?');
  $stmt->execute([$id]);
  header('Location: dashboard.php');
  exit;
}
// Récupération des projets
$stmt = $pdo->query('SELECT * FROM portfolio ORDER BY id DESC');
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Portfolio</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <main>
    <section class="admin-dashboard-section">
      <h2>Gestion du Portfolio</h2>
      <a href="edit_project.php" class="cta-btn" style="margin-bottom:2rem;display:inline-block;">Ajouter un projet</a>
      <table class="admin-table">
        <thead>
          <tr><th>Image</th><th>Titre</th><th>Description</th><th>Lien</th><th>Actions</th></tr>
        </thead>
        <tbody>
        <?php foreach($projects as $project): ?>
          <tr>
            <td><img src="../uploads/<?= htmlspecialchars($project['image']) ?>" alt="" style="width:80px;height:50px;object-fit:cover;"></td>
            <td><?= htmlspecialchars($project['titre']) ?></td>
            <td><?= htmlspecialchars($project['description']) ?></td>
            <td><?php if($project['lien']): ?><a href="<?= htmlspecialchars($project['lien']) ?>" target="_blank">Lien</a><?php endif; ?></td>
            <td>
              <a href="edit_project.php?id=<?= $project['id'] ?>">Modifier</a> |
              <a href="dashboard.php?delete=<?= $project['id'] ?>" onclick="return confirm('Supprimer ce projet ?');">Supprimer</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <a href="logout.php" class="cta-btn" style="margin-top:2rem;">Déconnexion</a>
    </section>
  </main>
</body>
</html>