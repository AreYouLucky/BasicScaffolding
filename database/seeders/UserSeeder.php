<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'fname'=>'Admin',
                'lname'=>'Admin',
                'mname'=>'Admin',
                'role'=>'ADMIN',
                'sex'=>'MALE',
                'email'=>'admin@dev.com',
                'password' => Hash::make('aa')
            ],
            [
                'fname'=>'John',
                'lname'=>'Cagadas',
                'mname'=>'Q',
                'role'=>'SELLER',
                'sex'=>'MALE',
                'email'=>'john@dev.com',
                'password' => Hash::make('aa')
            ],
            [
                'fname'=>'Arren',
                'lname'=>'Jacalan',
                'mname'=>'J',
                'role'=>'BUYER',
                'sex'=>'FEMALE',
                'email'=>'arren@dev.com',
                'password' => Hash::make('aa')
            ],




        ];

        \App\Models\User::insertOrIgnore($data);
    }
}
