<?php
    $page = "write";
    require_once("../../scripts/session.php");

    $user_id = $_SESSION['user_session'];

    // Publish article
    require_once("../../scripts/class.article.php");
    $article = new ARTICLE();

    $title = strip_tags($_POST['title']);
    $author = strip_tags($_POST['author']);
    $corps = $_POST['corps'];
    $preview = strip_tags($_POST['preview']);
    $date = strip_tags($_POST['date']);
    $filename = time(NULL)."_".str_replace(' ', '-', $title).".php";

    if (strlen($preview) >= 300) {
        echo "<div class='alert alert-danger'>Erreur : résumé trop long.</div>";
    } else {

        if ($article->publishToDirectory($corps, $filename, $title, $author, $date)) {

            if($article->publishToDatabase($user_id, $title, $author, $preview, $date, $filename)) {
                echo "<div class='alert alert-success'><a href='".$article->pathConstruction($filename)."' class='alert-link'>Votre article</a> a été publié.</div>";
            } else {
                echo "<div class='alert alert-danger'>Erreur lors de la publication de l'article.</div>";
            }

        } else {
            echo "<div class='alert alert-danger'>Erreur lors de la publication de l'article.</div>";
        }

    }
?>