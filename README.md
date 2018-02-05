# Le coup de jeune du Fil

## Avancée du projet

### Les technologies utilisées :

- Frontend : Bootstrap + Jquery.
- Backend : On passe à Laravel 5.5.

## Installation

Il faut tout d'abord un serveur Apache ainsi que mysql installés.

Afin d'installer Laravel il faut que votre version PHP remplissent ces conditions :

- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

Se placer dans le répertoire du projet.

Créer un fichier `.env` et coller dans celui-ci le contenu du fichier `.env.example`.

Il faut ensuite générer une nouvelle clé pour l'application grace à la commande : 

`php artisan key:generate`

Toujours dans le fichier `.env`, remplacer `DB_DATABASE`, `DB_USERNAME` et `DB_PASSWORD` par vos informations.

Vous pouvez ensuite executer la commande suivante pour mettre en place toutes les tables nécessaires dans la base de données : 

`php artisan migrate`

Optionnel : 

Dans le répertoire `database/seeds/`, créer un fichier appelé `AdminsSeeder.php` et y copier le code suivant en remplacant les informations de compte par celle que vous voulez.

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

Vous pouvez maintenant executer cette commande :

`php artisan db:seed` qui permettra d'avoir des jeux de données déjà présentes par défaut.