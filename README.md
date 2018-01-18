# Le coup de jeune du Fil

## Avancée du projet

Le choix actuel des technologies :

- Frontend : Bootstrap + Jquery.
- Backend : Custom PHP, pas de framework.

A discuter.

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
