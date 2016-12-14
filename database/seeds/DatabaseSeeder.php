<?php

use Illuminate\Database\Seeder;
use App\JobCategory;

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
    }
}