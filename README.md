# sDigitalWeb

Site vitrine moderne et responsive pour l'agence digitale sDigitalWeb.

## Fonctionnalités principales
- Présentation des services (création de sites web, SEO, marketing digital)
- Portfolio dynamique (modifié via un espace admin sécurisé)
- Formulaire de demande de devis intelligent
- Page contact avec carte Google Maps

Frontend : HTML5, CSS3, JavaScript  
Backend : PHP 8+, MySQL

## Installation
1. Cloner le repo et placer les fichiers sur votre serveur web (Apache/Nginx).
2. Créer une base de données MySQL `sdigitalweb` et importer la structure suivante :

```sql
CREATE TABLE `portfolio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

3. Configurer les accès MySQL dans `inc/db.php`.
4. Le dossier `uploads/` doit être accessible en écriture (chmod 777 pour test).
5. Accès admin : `/public/admin.php`  
Mot de passe par défaut : `admin2024` (à modifier dans `inc/admin_login.php`)
