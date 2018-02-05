<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Category;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Jérémy Pointel',
            'username' => 'jpointel',
            'email' => 'jeremy.pointel@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('president');

        $user = User::create([
            'name' => 'Sylvain Thimon',
            'username' => 'thimonsy',
            'email' => 'sylvain.thimon@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('member');

        $user = User::create([
            'name' => 'Sophie Grateau',
            'username' => 'sofil',
            'email' => 'sophie.grateau@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('member');

        $user = User::create([
            'name' => 'Valentin Le Gauche',
            'username' => 'Valentin',
            'email' => 'valentin.legauche@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('member');

        $user = User::create([
            'name' => 'Example',
            'username' => 'example',
            'email' => 'example@example.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('writer');
    }
}
