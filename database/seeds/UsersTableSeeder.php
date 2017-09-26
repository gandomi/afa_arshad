<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Ali Gandomi";
        $user->username = "ali_gandomi";
        $user->email = "gandomi110@gmail.com";
        $user->password = bcrypt('123456');
        $user->save();
    }
}
