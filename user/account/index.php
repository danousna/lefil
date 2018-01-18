<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]).'/LeFil/';
    
    $page = "account";

    require_once($root."scripts/session.php");
    
    require_once($root."scripts/class.user.php");
    $auth_user = new USER();
    
    
    $user_id = $_SESSION['user_session'];
    
    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $auth_user->runQuery("SELECT * FROM articles WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));

    if(isset($_GET['action']) && isset($_GET['article_id']) && $_GET['action'] == 'delete') {     
        $stmt = $auth_user->runQuery("DELETE FROM articles WHERE article_id=:article_id");
        $stmt->execute(array(":article_id"=>$_GET['article_id']));

        $auth_user->redirect('index.php?delete=true');
    }
    if(isset($_GET['action']) && isset($_GET['article_id']) && $_GET['action'] == 'modify') {
        $auth_user->redirect("../?modify_article=".$_GET['article_id']);
    }  
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Le Fil</title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#modify-account-btn").on('click', function() {
                $(".static-info").hide();
                $("#modify-account-btn").hide();
                $(".input-info").show();
                $("#submit-account-btn").show();
            });
            $("#modify-info-form").submit(function() {
                $.ajax({
                    type:"POST", 
                    data: $(this).serialize(), 
                    url:"modify-account.php", 
                    success: function(data) {
                        //$("#message").html(data);
                        location.reload();
                    },
                    error: function () {
                        $("#message").html("<div class='alert alert-danger'>Erreur lors de l'envoi des données.</div>");
                    }
                });
                return false;
            });
        });
    </script>

</head>

<body>

    <!-- Navigation -->
    <?php include "../models/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <h1 class="my-4">Espace utilisateur</h1>

                <div class="card my-4">
                    <h5 class="card-header">Informations générales</h5>
                    <div class="card-body">

                        <div id="message"></div>

                        <form method="POST" id="modify-info-form">
                            <table class="table table-responsive-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nom d'utilisateur (CAS-UTC) :</th>
                                        <td><?php echo $userRow['cas_user_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nom d'utilisateur :</th>
                                        <td class="static-info"><?php echo $userRow['user_name']; ?></td>
                                        <td class="input-info" style="display: none;"><input type="text" name="txt_uname" class="form-control" value="<?php echo $userRow['user_name']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Adresse mail :</th>
                                        <td class="static-info"><?php echo $userRow['user_email']; ?></td>
                                        <td class="input-info" style="display: none;"><input type="email" name="txt_umail" class="form-control" value="<?php echo $userRow['user_email']; ?>"></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <button id="submit-account-btn" type="submit" name="submit-account-btn" style="display: none;" class="btn btn-primary">Enregistrer</button>
    
                        </form>

                        <button id="modify-account-btn" class="btn btn-primary">Modifier</button>

                    </div>

                </div>

                <div class="card my-4">
                    <h5 class="card-header">Articles écrits</h5>
                    <div class="card-body">
                        <div id="error">
                            <?php
                                if(isset($_GET['delete']) && $_GET['delete'] == 'true')
                                {
                                    echo"<div class='alert alert-info'>
                                        L'article a été supprimé.
                                    </div>";
                                }
                            ?>
                        </div>
                        <table class="table table-responsive-sm table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Date de publication</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while ($userArticles=$stmt->fetch(PDO::FETCH_ASSOC)) {

                                        echo '
                                            <tr>
                                                <td><a href="'.$userArticles['articlePath'].'">'.$userArticles['title'].'</a></td>
                                                <td>'.$userArticles['publishDate'].'</td>
                                                <td><a href="index.php?action=modify&article_id='.$userArticles['article_id'].'" class="btn btn-primary btn-sm">Modifier</a> <a href="index.php?action=delete&article_id='.$userArticles['article_id'].'" class="btn btn-danger btn-sm">Supprimer</a></td>
                                            </tr> 
                                        '; 
                                    }
                                ?>
                            </tbody>

                        </table>

                    </div>

                </div>
          
            </div>

            <!-- Sidebar Widgets Column -->
            <?php include "../models/sidebar.php"; ?>

        </div>

    </div>

    <!-- Footer -->
    <?php include "../../models/footer.php"; ?>

</body>

</html>