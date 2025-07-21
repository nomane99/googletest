<?php
session_start();
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
  header('Location: dashboard.php');
  exit;
}
$error = isset($_GET['error']) ? 'Mot de passe incorrect.' : '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Connexion</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <main>
    <section class="admin-login-section">
      <h2>Connexion Admin</h2>
      <?php if($error): ?><p class="error-msg"><?= $error ?></p><?php endif; ?>
      <form method="post" action="../inc/admin_login.php" class="admin-login-form">
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="cta-btn">Se connecter</button>
      </form>
    </section>
  </main>
</body>
</html>