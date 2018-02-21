<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Category;
use App\User;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name' => 'Général',
        ]);
        $members = User::role('member')->pluck('id')->toArray();
        $category->users()->sync($members);

        $category = Category::create([
            'name' => 'Édito',
        ]);
        $category->users()->sync(User::where('username', 'thimonsy')->first()->id);

        $category = Category::create([
            'name' => 'Le Gorafil',
        ]);
        $category->users()->sync(User::where('username', 'jpointel')->first()->id);

        $category = Category::create([
            'name' => 'Bobine X',
        ]);
        $category->users()->sync(User::where('username', 'sofil')->first()->id);

        $category = Category::create([
            'name' => 'Scientifil',
        ]);
        $category->users()->sync(User::where('username', 'sofil')->first()->id);

        $category = Category::create([
            'name' => 'Au Fil de la Pensée',
        ]);
        $category->users()->sync(User::where('username', 'Valentin')->first()->id);

        $category = Category::create([
            'name' => 'Enfin un Chinois qui vous Parle',
        ]);

        $category = Category::create([
            'name' => 'Random',
        ]);

        // Give all categories to admin and president.
        $adminUsers = User::role('admin')->pluck('id')->toArray();
        $presidentUsers = User::role('president')->pluck('id')->toArray();
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->users()->syncWithoutDetaching($adminUsers);
            $category->users()->syncWithoutDetaching($presidentUsers);
        }
    }
}
