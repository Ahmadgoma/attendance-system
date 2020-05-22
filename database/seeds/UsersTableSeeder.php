<?php

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
        $user = new \App\Models\User();
        $user->name = 'Ahmad Gomaa';
        $user->email = 'asd@gmail.com';
        $user->user_type_id = 1;
        $user->password = bcrypt('123456');
        $user->save();
    }
}
