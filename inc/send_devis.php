<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $service = trim($_POST['service'] ?? '');
    $budget = trim($_POST['budget'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $errors = [];
    if (!$nom || !$email || !$service || !$budget || !$message) {
        $errors[] = 'Tous les champs sont obligatoires.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email invalide.';
    }
    if (empty($errors)) {
        $to = 'contact@sdigitalweb.fr'; // À personnaliser
        $subject = 'Nouvelle demande de devis';
        $body = "Nom: $nom\nEmail: $email\nService: $service\nBudget: $budget\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email";
        mail($to, $subject, $body, $headers);
        header('Location: ../public/devis.php?sent=1');
        exit;
    } else {
        header('Location: ../public/devis.php?error=1');
        exit;
    }
} else {
    header('Location: ../public/devis.php');
    exit;
}