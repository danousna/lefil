# Le coup de jeune du Fil

## Avancée du projet

### Le choix actuel des technologies :

- Frontend : Bootstrap + Jquery.
- Backend : Laravel.

A discuter.

### Ce qui a été fait :

- Système de connexion.
- Système d'inscription par le CAS.
- Gestion des articles (stockage, supprimer, auteur)
- Ecrire des articles riches (images, mise en page etc...) (mise en place de tinyMCE).
- Page principale avec listing des articles

### Des petits trucs pas encore finalisés :

- Modifier un article
- Listing des articles sur la page principale doit respecter date.
- ... (j'en oublie surement)

### Des gros trucs :

- Mettre en place les commentaires
- Mettre en place une hiérarchie des membres inscrits (membre qui peut commenter et soumettre un article, membre de l'association qui peut publier etc...)
- Recherche
- Catégories ou keywords pour faciliter la recherche
- Archive
- Rubrique "officielles" où seuls les membres de l'asso peuvent publier ?
- ...

## Configuration et mise en place de la base de données

Créer une base de données sous SQL puis importer le dump SQL de la BDD : `bdd.sql`. 

Besoin d'ajouter le fichier `dbconfig.php` dans `scripts/` afin de mettre en place la BDD et remplacer les quotes vides par les identifiants de la BDD mysql.

```php
<?php
class Database
{   
    private $host = "";
    private $db_name = "";
    private $username = "";
    private $password = "";
    public $conn;
     
    public function dbConnection()
    {
     
        $this->conn = null;    
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>
```
