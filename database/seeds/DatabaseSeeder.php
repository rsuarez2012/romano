<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	App\User::create([
    		'name' => 'Raul suarez',
    		'email' => 'raul.suarez12@gmail.com',
    		'password' => Hash::make('admin'),
    	]);
    	factory(App\User::class, 7)->create();
         //$this->call(TasksTableSeeder::class);
        App\Page::create([
        	'parent_id' => null,
        	'title' => 'Quienes Somos',
        	'slug' => 'quienes-somos',
        	'body' => 'Contenido de quienes somos.',
        ]);
        App\Page::create([
        	'parent_id' => 1,
        	'title' => 'Misión',
        	'slug' => 'mision',
        	'body' => 'Contenido de mision.',
        ]);
        App\Page::create([
        	'parent_id' => 1,
        	'title' => 'Visión',
        	'slug' => 'vision',
        	'body' => 'Contenido de vision.',
        ]);
    }
}
