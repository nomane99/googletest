<?php
session_start();
session_destroy();
header('Location: ../public/admin.php');
exit;