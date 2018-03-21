# Documentation

## Technologies utilisées :

- Frontend : Bootstrap 4 + Jquery
- Backend : Laravel 5.6

## Installation

Voir la documentation de Laravel :

[https://laravel.com/docs/5.6/installation](https://laravel.com/docs/5.6/installation)

À installer :

- php-curl pour Algolia
- php-gd pour Image Intervention

Se placer dans le répertoire du projet et installer les dépendances :

`composer install`

Créer un fichier `.env` et coller dans celui-ci le contenu du fichier `.env.example`.

Il faut ensuite générer une nouvelle clé pour l'application grace à la commande : 

`php artisan key:generate`

Toujours dans le fichier `.env`, remplacer `DB_DATABASE`, `DB_USERNAME` et `DB_PASSWORD` par vos informations.

Vous pouvez ensuite executer la commande suivante pour mettre en place toutes les tables nécessaires dans votre base de données : 

`php artisan migrate`

Optionnel : 

Dans le répertoire `database/seeds/`, créer un fichier appelé `AdminsSeeder.php` et copier le code suivant en remplacant les informations de compte par celle que vous voulez.

```php
<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Category;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'NOM',
            'username' => 'USERNAME',
            'email' => 'EMAIL',
            'password' => bcrypt('PASSWORD'),
        ]);

        $admin->assignRole('admin');
    }
}
```

Vous pouvez maintenant executer cette commande pour populer la base de données :

`php artisan db:seed`