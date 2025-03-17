<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'name' => 'Model',
                'description' => 'Laravel models are the core of Laravel\'s ORM, providing an elegant way to interact with database tables. They handle data validation, relationships, and mutations.'
            ],
            [
                'name' => 'View',
                'description' => 'Views in Laravel are responsible for presenting data to users. They separate the presentation logic from business logic using the Blade templating engine.'
            ],
            [
                'name' => 'Controller',
                'description' => 'Controllers handle HTTP requests and return responses. They serve as the bridge between models and views, orchestrating the application\'s logic.'
            ],
            [
                'name' => 'Routes',
                'description' => 'Routes define the endpoints of your application and map them to controller actions. They support various HTTP methods and can be grouped and nested.'
            ],
            [
                'name' => 'Middleware',
                'description' => 'Middleware provides a convenient mechanism for filtering HTTP requests entering your application. They can perform tasks before or after requests are handled.'
            ],
            [
                'name' => 'Blade Templates',
                'description' => 'Blade is Laravel\'s powerful templating engine that combines pure PHP with convenient shortcuts for common tasks. It includes features like inheritance, components, and slots.'
            ],
            [
                'name' => 'Migrations',
                'description' => 'Migrations allow for version control of your database schema. They make it easy to modify and share the application\'s database structure.'
            ],
            [
                'name' => 'Seeders',
                'description' => 'Seeders populate your database with test data. They work alongside migrations to ensure your application has consistent data for development and testing.'
            ],
            [
                'name' => 'Database',
                'description' => 'Laravel provides a robust database layer with support for multiple database systems. It includes query builders, raw SQL execution, and transaction management.'
            ],
            [
                'name' => 'Eloquent ORM',
                'description' => 'Eloquent is Laravel\'s implementation of the Active Record pattern. It provides an elegant, intuitive way to interact with databases using PHP objects.'
            ],
        ];

        foreach ($features as $feature) {
            DB::table('tbl_features')->insert($feature);
        }
    }
}