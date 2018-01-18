<?php 
    $root = realpath($_SERVER["DOCUMENT_ROOT"]).'/LeFil/';
    
    $page = "write";
    require_once($root."scripts/session.php");

    // Get user infos
    require_once($root."scripts/class.user.php");

    $auth_user = new USER();

    $user_id = $_SESSION['user_session'];

    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));

    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    // Construction of min date and max date.
    require_once($root."scripts/class.article.php");
    $article = new ARTICLE();

    $current_date = $article->dateConstruction();

    $min_date = $current_date[0].'-'.$current_date[1].'-'.$current_date[2];
    $max_date = 1+$current_date[0].'-'.$current_date[1].'-'.$current_date[2];
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

    <!-- Publish article -->
    <script type="text/javascript">
        $(document).ready(function() {
            var $limitNum = 300;
            $('textarea[name="preview"]').keydown(function() {
                var $this = $(this);

                if ($this.val().length > $limitNum) {
                    $this.val($this.val().substring(0, $limitNum));
                }
            });
            $("#article-form").submit(function() {
                $.ajax({
                    type:"POST", 
                    data: $(this).serialize(), 
                    url:"post.php", 
                    success: function(data) {
                        $("#message").html(data);
                        $("#article-form").hide();
                    },
                    error: function () {
                        $("#message").html("<div class='alert alert-danger'>Erreur lors de l'envoi des données.</div>");
                    }
                });
                return false;
            });
        });
    </script>

    <script src='js/tinymce/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#corps',
            plugins: "preview fullscreen image link searchreplace contextmenu wordcount",
            browser_spellcheck: true,
            language: 'fr_FR',
            branding: false,
            skin: "custom"
        });
    </script>
    <!-- <script src="textboxio/textboxio.js"></script> -->
</head>

<body>

    <!-- Navigation -->
    <?php include "../models/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <h1 class="my-4">Écrire un article</h1>

                <div class="my-4">
                    <div id="message"></div>
                    <form method="POST" id="article-form">
                        <div class="form-group">
                            <label>Titre :</label>
                            <input type="text" class="form-control" name="title" maxlength="150" placeholder="Titre de l'article" required />
                        </div>
                        
                        <div class="form-group">
                            <label>Nom de l'auteur :</label>
                            <input type="text" class="form-control" name="author" maxlength="40" placeholder="Auteur" value="<?php echo $userRow['user_name'];?>" />
                        </div>

                        <div class="form-group">
                            <label>Article :</label>
                            <textarea id="corps" name="corps" style="height: 400px;"></textarea>
                        </div>

                        <!-- <div class="form-group">
                            <label>Photo :</label>
                            <input type="text" class="form-control" name="">
                            <small class="form-text text-muted">La photo principale de votre article.</small>
                        </div> -->

                        <div class="form-group">
                            <label>Résumé :</label>
                            <textarea class="form-control" name="preview" style="height: 70px;" placeholder="Résumé de l'article."></textarea>
                            <small class="form-text text-muted">Si vous ne savez pas quoi mettre, mettez la première phrase de votre article.</small>
                        </div>

                        <div class="form-group">
                            <label>Date de publication :</label>
                            <input type="date" class="form-control" name="date" max="<?php echo $max_date;?>" min="<?php echo $min_date;?>" value="<?php echo $min_date;?>">
                            <small class="form-text text-muted">Il est possible de programmer la publication jusqu'à 1 an. Il est impossible de prédater un article.</small>
                        </div>

                        <button type="submit" name="btn-publish" class="btn btn-primary">Publier</button>
                    </form>
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <?php include "../models/sidebar.php"; ?>

        </div>

    </div>

    <!-- Footer -->
    <?php include "../../models/footer.php"; ?>

    <!-- <script type="text/javascript">
        var editor = textboxio.replace('#corps');
    </script> -->
</body>

</html>
