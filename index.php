<?php
    $host = realpath($_SERVER["HTTP_HOST"])."/LeFil/";
    $page = "home";
    session_start();
    require_once("scripts/class.user.php");
    $login = new USER();

    if($login->is_loggedin() != "") {
        $login->redirect('user/');
    }
?>
<?php include "models/head.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "models/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Articles -->
            <?php include "scripts/article-listing.php";?>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Rechercher sur le site</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recherche...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Catégories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">UTC</a>
                                    </li>
                                    <li>
                                        <a href="#">Assos</a>
                                    </li>
                                    <li>
                                        <a href="#">Perms</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Polar</a>
                                    </li>
                                    <li>
                                        <a href="#">Edito</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Le saviez vous ?</h5>
                    <div class="card-body">
                        Le Fil est entièrement financé par le Polar.
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Footer -->
    <?php include "models/footer.php"; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
