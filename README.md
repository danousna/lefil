# Le coup de jeune du Fil

## Avancée du projet

### Le choix actuel des technologies :

- Frontend : Bootstrap + Jquery.
- Backend : On passe à Laravel 5.5.

## Installation

Le projet fonctionne sous Laravel 5.5. Pour l'installation, il faut :

- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

(En plus d'apache, mysql)

Se placer dans le répertoire du projet.

Créer un fichier `.env` et coller dans celui-ci le contenu du fichier `.env.example`.

Il faut ensuite générer une nouvelle clé pour l'application grace à la commande : 

`php artisan key:generate`

Toujours dans le fichier `.env`, remplacer `DB_DATABASE`, `DB_USERNAME` et `DB_PASSWORD` par vos informations.

Vous pouvez ensuite executer la commande suivante pour mettre en place toutes les tables nécessaires dans la base de données : 

`php artisan migrate`

Optionnel : `php artisan db:seed` qui permettra d'avoir des jeux de données déjà présentes par défaut.