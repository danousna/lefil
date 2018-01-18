<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]).'/LeFil/';

    require_once($root."scripts/class.article.php");
    $articleClass = new ARTICLE();
    
    $stmt = $articleClass->runQuery("SELECT * FROM articles");
    $stmt->execute(array(
        ":article_id"=>$article_id
    ));
?>
<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="my-4">Articles</h1>

    <?php 
        $i = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($i >= 10) {
                break;
            } else {
                $date = explode('-', $row['publishDate']);
                echo '
                <!-- Blog Post -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">' .$row['title']. '</h2>
                        <p class="card-text">' .$row['preview']. '</p>
                        <a href=" ' .$row['articlePath']. ' " class="btn btn-primary">Lire l\'article &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Publié le '.$date[2].'/'.$date[1].'/'.$date[0].' par
                        <a href="#">' .$row['author']. '</a>
                    </div>
                </div>
                ';
            }
            $i++;
        }
    ?>

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Précedent</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Suivant &rarr;</a>
        </li>
    </ul>

</div>