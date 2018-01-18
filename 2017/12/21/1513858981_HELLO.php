<?php
    $host = realpath($_SERVER["HTTP_HOST"])."/LeFil/";
    $root = realpath($_SERVER["DOCUMENT_ROOT"])."/LeFil/";
    session_start();
    require_once($root."scripts/class.user.php");
    $login = new USER();
    $user = false;
    if($login->is_loggedin() != "") {
        $user = true;
    }
?>
<?php include $root."models/head.php"; ?>
<body>
    <!-- Navigation -->
    <?php 
        if ($user) {
            include $root."user/models/navbar.php";     
        } else {
            include $root."models/navbar.php"; 
        }
    ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <div class="card my-4">
                    <div class="card-header">
                        <!-- Title -->
                        <h1 class="mt-4">HELLO</h1>
                        <p class="lead"><a href="#">Natan</a> - 2017-12-21</p>
                    </div>
                    <!-- Post Content -->
                    <div class="card-body">
                        <p><em><strong>TEDT</strong></em></p>
                    </div>
                </div>
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Commenter cet article</h5>
                    <?php 
                        if ($user) {
                            echo "
                                <div class='card-body'>
                                    <form>
                                        <div class='form-group'>
                                            <textarea class='form-control' rows='3'></textarea>
                                        </div>
                                        <button type='submit' class='btn btn-primary'>Publier</button>
                                    </form>
                            ";     
                        } else {
                            echo "
                                <div class='card-body text-center'>
                                    <p>Vous devez être connecté pour commenter</p>
                                    <a href='/LeFil/login/' class='btn btn-primary'>Connexion</a>
                            "; 
                        }
                    ?>
                    </div>
                </div>

                <div class="card my-4">
                    <h5 class="card-header">Commentaires</h5>
                    <div class="card-body">
                        <!-- Single Comment -->
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- Comment with nested comments -->
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                <div class="media mt-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">Commenter Name</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>
                                <div class="media mt-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">Commenter Name</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Widgets Column -->
            <?php 
                if ($user) {
                    include $root."user/models/sidebar.php";     
                } else {
                    include $root."models/sidebar.php"; 
                }
            ?>
        </div>
    </div>
    <!-- Footer -->
    <?php include $root."models/footer.php"; ?>
    <!-- Bootstrap core JavaScript -->
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
        