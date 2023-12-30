<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(2)->unverified()->create();
        \App\Models\Task::factory(20)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}


// Working with models, migrations, factories, and seeders in Laravel involves creating, defining, and interacting with these components to set up and populate your database. Here's a step-by-step guide on how to work with them:

// 1. Create a Model:
// Use the Artisan command to create a model. This will also create a corresponding Eloquent model file.
// This will create a Post.php file in the app/Models directory (or app directory for older Laravel versions). Edit this file to define your model.

// 2. Create a Migration:
// Generate a migration file for the model using the Artisan command:
//     This will create a migration file in the database/migrations directory. Open the migration file and define the schema for the posts table.
//     Run the migration to create the posts table in the database:
//     by this command :- php artisan migrate


// 3. Create a Factory:
// Generate a model factory using the Artisan command:
//     php artisan make:factory PostFactory --model=Post
//     Edit the generated PostFactory.php file in the database/factories directory to define the structure of your model's dummy data.

// 4. Run Database Seeder:
// Generate a seeder using the Artisan command:
//     php artisan make:seeder PostSeeder
// Edit the generated PostSeeder.php file in the database/seeders directory. In the run method, use the model factory to seed the database with dummy data.


// 5. Run All Seeders:
// Update the DatabaseSeeder class in the database/seeders directory to call your seeder class.
// Run all seeders to populate your database:
//     php artisan db:seed


