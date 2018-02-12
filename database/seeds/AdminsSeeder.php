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
        $natan = User::create([
            'name' => 'Natan Danous',
            'username' => 'danousna',
            'email' => 'natan.danous@etu.utc.fr',
            'password' => bcrypt('natandanous'),
        ]);

        $natan->assignRole('admin');
    }
}