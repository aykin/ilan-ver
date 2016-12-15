<?php
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $credentials = [
            'email' => 'admin@webrazzi.com',
            'name' => 'admin',
            'password' => ''
        ];

        $credentials['password'] = \Illuminate\Support\Facades\Hash::make("parola");

        User::create($credentials);
    }
}
