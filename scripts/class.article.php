<?php
require_once('dbconfig.php');

date_default_timezone_set('Europe/Paris');

class ARTICLE {
    private $conn;
    private $URL;

    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
        $this->URL = $_SERVER['HTTP_HOST'];
    }

    // Construct date
    public function dateConstruction() {
        $timestamp = time();
        $date = date('Y m d');
        $date = explode(' ', $date);

        // $year = $date[0];
        // $month = $date[1];
        // $day = $date[2];

        return $date;
    }

    // Organize stored article by year/month/day
    private function articleDirectoryMaker() {

        $date = $this->dateConstruction();

        if (!file_exists($this->URL."/LeFil/".$date[0]."/".$date[1]."/".$date[2])) {
            mkdir($_SERVER['DOCUMENT_ROOT']."/LeFil/".$date[0]."/".$date[1]."/".$date[2], 0755, true);
        }
    }

    // Construct path
    public function pathConstruction($filename) {

        $date = $this->dateConstruction();
        
        $path = "/LeFil/".$date[0]."/".$date[1]."/".$date[2]."/".$filename;

        return $path;
    }
    
    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function publishToDirectory($articleData, $filename, $title, $author, $date) {
        $this->articleDirectoryMaker();

        $path = $this->pathConstruction($filename);

        $file = fopen($_SERVER['DOCUMENT_ROOT'].$path, "w");

        // if (file_exists($path)) {
        //     chmod($path, "0750");
        // }

        $data = '<?php
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
                        <h1 class="mt-4">'.$title.'</h1>
                        <p class="lead"><a href="#">'.$author.'</a> - '.$date.'</p>
                    </div>
                    <!-- Post Content -->
                    <div class="card-body">
                        '.$articleData.'
                    </div>
                </div>
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Commenter cet article</h5>
                    <?php 
                        if ($user) {
                            echo "
                                <div class=\'card-body\'>
                                    <form>
                                        <div class=\'form-group\'>
                                            <textarea class=\'form-control\' rows=\'3\'></textarea>
                                        </div>
                                        <button type=\'submit\' class=\'btn btn-primary\'>Publier</button>
                                    </form>
                            ";     
                        } else {
                            echo "
                                <div class=\'card-body text-center\'>
                                    <p>Vous devez être connecté pour commenter</p>
                                    <a href=\'/LeFil/login/\' class=\'btn btn-primary\'>Connexion</a>
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
        ';

        fwrite($file, $data);

        fclose($file);

        return 1;
    }

    public function publishToDatabase ($user_id, $title, $author, $preview, $date, $filename) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO articles(user_id,title,author,preview,publishDate,articlePath) 
                                                       VALUES(:uid, :atitle, :aauthor, :apreview, :adate, :apath)");
                                                  
            $stmt->bindparam(":uid", $user_id);
            $stmt->bindparam(":atitle", $title);
            $stmt->bindparam(":aauthor", $author);
            $stmt->bindparam(":apreview", $preview);
            $stmt->bindparam(":adate", $date);
            $stmt->bindparam(":apath", $this->pathConstruction($filename));                                      
                
            $stmt->execute();   
            
            return $stmt;   
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
        
    public function redirect($url) {
        header("Location: $url");
    }
} 
?> 