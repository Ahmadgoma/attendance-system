<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_types = [
            'admin',
            'employee',
        ];

        foreach ($user_types as $value){
            $user_type = new \App\Models\UserType();
            $user_type->type = $value;
            $user_type->save();
        }
    }
}
