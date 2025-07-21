<?php
require_once '../inc/db.php';
$sql = 'SELECT * FROM portfolio ORDER BY id DESC';
$stmt = $pdo->query($sql);
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio - sDigitalWeb</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">sDigitalWeb</div>
      <ul class="nav-links">
        <li><a href="index.html#services">Services</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="index.html#devis">Devis</a></li>
        <li><a href="index.html#contact">Contact</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="portfolio-section">
      <h2>Nos Réalisations</h2>
      <div class="portfolio-list">
        <?php foreach($projects as $project): ?>
        <div class="portfolio-card">
          <img src="../uploads/<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['titre']) ?>">
          <h3><?= htmlspecialchars($project['titre']) ?></h3>
          <p><?= htmlspecialchars($project['description']) ?></p>
          <?php if($project['lien']): ?>
            <a href="<?= htmlspecialchars($project['lien']) ?>" target="_blank" class="portfolio-link">Voir le projet</a>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
    </section>
  </main>
  <footer>
    <p>&copy; 2024 sDigitalWeb. Tous droits réservés.</p>
  </footer>
</body>
</html>