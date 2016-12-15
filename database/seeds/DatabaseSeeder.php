<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->command->info('Categories Created');
        $this->call(UserSeeder::class);
        $this->command->info('Admin User Created');
    }
}