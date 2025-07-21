<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header('Location: ../public/admin.php');
  exit;
}
require_once '../inc/db.php';
$id = $_GET['id'] ?? null;
$edit = false;
$project = ['titre'=>'','description'=>'','lien'=>'','image'=>''];
if ($id) {
  $stmt = $pdo->prepare('SELECT * FROM portfolio WHERE id = ?');
  $stmt->execute([$id]);
  $project = $stmt->fetch(PDO::FETCH_ASSOC);
  $edit = true;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $edit ? 'Modifier' : 'Ajouter' ?> un projet - Admin</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <main>
    <section class="admin-edit-section">
      <h2><?= $edit ? 'Modifier' : 'Ajouter' ?> un projet</h2>
      <form method="post" action="../inc/save_project.php" enctype="multipart/form-data" class="admin-edit-form">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($project['titre']) ?>" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea id="description" name="description" rows="3" required><?= htmlspecialchars($project['description']) ?></textarea>
        </div>
        <div class="form-group">
          <label for="lien">Lien (optionnel)</label>
          <input type="url" id="lien" name="lien" value="<?= htmlspecialchars($project['lien']) ?>">
        </div>
        <div class="form-group">
          <label for="image">Image <?php if($edit && $project['image']): ?>(laisser vide pour ne pas changer)<?php endif; ?></label>
          <input type="file" id="image" name="image" accept="image/*" <?= $edit ? '' : 'required' ?>>
          <?php if($edit && $project['image']): ?>
            <img src="../uploads/<?= htmlspecialchars($project['image']) ?>" alt="" style="width:120px;margin-top:1rem;">
          <?php endif; ?>
        </div>
        <button type="submit" class="cta-btn"><?= $edit ? 'Enregistrer' : 'Ajouter' ?></button>
      </form>
      <a href="dashboard.php" class="cta-btn" style="margin-top:2rem;">Retour</a>
    </section>
  </main>
</body>
</html>