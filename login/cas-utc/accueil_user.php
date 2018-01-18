<?php
$page = "login";
session_start();
require_once('../../scripts/class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
    $user->redirect('../../user.php');
}

if(isset($_POST['btn-signup']))
{
    $ucas = $_SESSION['user'];
    $uname = strip_tags($_POST['txt_uname']);
    $umail = strip_tags($_POST['txt_umail']);
    $upass = strip_tags($_POST['txt_upass']);
    $upassconfirm = strip_tags($_POST['txt_upassconfirm']); 

    if($uname=="")  {
        $error[] = "Entrer un nom d'utilisateur.";  
    }
    else if($umail=="") {
        $error[] = "Entrer une adresse mail.";  
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Entrer une adresse mail valide.';
    }
    else if($upass=="") {
        $error[] = "Entrer un un mot de passe.";
    }
    else if(strlen($upass) < 6){
        $error[] = "Entrer un mot de passe plus long (> 6 caractères)."; 
    }
    else if($upass != $upassconfirm) {
        $error[] = "Entrer le même mot de passe afin de continuer.";
    }
    else
    {
        try
        {
            $stmt = $user->runQuery("SELECT cas_user_name, user_email FROM users WHERE cas_user_name=:ucas OR user_email=:umail");
            $stmt->execute(array(':ucas'=>$ucas, ':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['cas_user_name'] == $ucas) {
                $error[] = "Vous êtes déjà inscrit.";
            }
            else if($row['user_email'] == $umail) {
                $error[] = "Cette adresse mail existe déjà";
            }
            else
            {
                if($user->register($ucas,$uname,$umail,$upass)){ 
                    $logoutURL = $myUrl.'?section=logout'; 
                    $user->redirect($logoutURL);
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
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
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include "../../models/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Inscription</h1>

                <div class="card my-4">
                    <h5 class="card-header">Vos informations</h5>
                    <div class="card-body">
                        <form method="post" class="form-signin">
                            <?php
                            if(isset($error))
                            {
                                foreach($error as $error)
                                {
                                    ?>
                                    <div class="alert alert-danger">
                                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="txt_uname" placeholder="Nom d'utilisateur" value="<?php if(isset($error)){echo $uname;}else{echo $_SESSION['user'];}?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="txt_umail" placeholder="Adresse mail" value="<?php if(isset($error)){echo $umail;}else{echo $_SESSION['mail'];}?>" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="txt_upass" placeholder="Mot de passe" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="txt_upassconfirm" placeholder="Confirmer le mot de passe" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="btn-signup">Inscription</button>
                            </div>
                        </form>
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

            </div>

        </div>

    </div>

    <!-- Footer -->
    <?php include "../../models/footer.php"; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>