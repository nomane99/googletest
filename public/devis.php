<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demande de devis - sDigitalWeb</title>
  <link rel="stylesheet" href="../css/style.css">
  <script defer src="../js/main.js"></script>
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">sDigitalWeb</div>
      <ul class="nav-links">
        <li><a href="index.html#services">Services</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="devis.php">Devis</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="devis-section">
      <h2>Demande de devis</h2>
      <form class="devis-form" method="post" action="../inc/send_devis.php">
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="service">Service souhaité</label>
          <select id="service" name="service" required>
            <option value="">-- Choisir --</option>
            <option value="siteweb">Création de site web</option>
            <option value="seo">SEO</option>
            <option value="marketing">Marketing digital</option>
          </select>
        </div>
        <div class="form-group">
          <label for="budget">Budget estimé</label>
          <select id="budget" name="budget" required>
            <option value="">-- Choisir --</option>
            <option value="<1000">Moins de 1000€</option>
            <option value="1000-3000">1000€ - 3000€</option>
            <option value=">3000">Plus de 3000€</option>
          </select>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="cta-btn">Envoyer la demande</button>
      </form>
    </section>
  </main>
  <footer>
    <p>&copy; 2024 sDigitalWeb. Tous droits réservés.</p>
  </footer>
</body>
</html>