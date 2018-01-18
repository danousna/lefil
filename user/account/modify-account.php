<?php
    require_once("../../scripts/session.php");

    require_once("../../scripts/class.user.php");

    $user_id = $_SESSION['user_session'];

    $current_user = new USER();

    $uname = $_POST['txt_uname'];
    $umail = $_POST['txt_umail'];

    $stmt = $current_user->runQuery("UPDATE users SET user_name=:uname, user_email=:umail WHERE user_id=:uid");
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':umail', $umail);
    $stmt->bindParam(':uid', $user_id);   
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Vos informations ont été modifiées.</div>";
    } else {
        echo "<div class='alert alert-danger'>Erreur lors de l'envoi des données.</div>";
    }
?>