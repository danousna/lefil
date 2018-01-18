<?php 
require_once('../scripts/session.php');
require_once('../scripts/class.user.php');
$user_logout = new USER();

$user_logout->doLogout();
$user_logout->redirect('../index.php');
?>