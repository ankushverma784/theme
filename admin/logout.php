<?php
session_start();
session_destroy();
header('Location:/theme/admin/index.php');
?>
