<?php
$page = "login";

session_start();
require_once("../scripts/class.user.php");
$login = new USER();

if($login->is_loggedin() != "") {
    $login->redirect('../user/');
}

if(isset($_POST['btn-login'])) {
    $uname = strip_tags($_POST['txt_uname_email']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);
        
    if($login->doLogin($uname,$umail,$upass))
    {
        $login->redirect('../user/');
    }
    else
    {
        $error = "Indentifiants incorrects, veuillez réessayer.";
    }   
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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include "../models/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Connexion</h1>

                <div class="card my-4">
                    <h5 class="card-header">Je suis déjà inscrit</h5>
                    <div class="card-body">
                        <form method="post" id="login-form">
                            <div id="error">
                                <?php
                                    if(isset($error))
                                    {
                                        ?>
                                        <div class="alert alert-danger">
                                           <?php echo $error; ?>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="txt_uname_email" placeholder="Nom d'utilisateur" required />
                                <span id="check-e"></span>
                            </div>
                            
                            <div class="form-group">
                                <input type="password" class="form-control" name="txt_password" placeholder="Mot de passe" />
                            </div>

                            <button type="submit" name="btn-login" class="btn btn-primary">Connexion</button>
                        </form>
                    </div>
                </div>

                <div class="card my-4">
                    <h5 class="card-header">Inscription (CAS UTC)</h5>
                    <div class="card-body">
                        <a href="cas-utc/index.php?section=login" class="btn btn-primary">Connexion</a>
                    </div>
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Besoin d'aide ?</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <a href="#" class="btn btn-secondary">Nous contacter</a>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Le saviez vous ?</h5>
                    <div class="card-body">
                        Pour vous inscrire, vous devez d'abord vous identifier par le CAS de l'UTC. Vous pourrez par la suite modifier les informations de votre compte.
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Footer -->
    <?php include "../models/footer.php"; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
