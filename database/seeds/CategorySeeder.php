<?php
use App\JobCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_categories')->delete();

        JobCategory::create([
            'id' => 1,
            'name' => 'Yazılım/Teknoloji'
        ]);

        JobCategory::create([
            'id' => 2,
            'name' => 'Tasarım'
        ]);

        JobCategory::create([
            'id' => 3,
            'name' => 'Satış/Pazarlama'
        ]);

        JobCategory::create([
            'id' => 4,
            'name' => 'Yönetim'
        ]);

    }
}
