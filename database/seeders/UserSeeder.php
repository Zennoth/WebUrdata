<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        $user = new User();
        $user->email = 'rel@lecturer.com';
        $user->password = Hash::make('12345678');
        $user->role_id = '2';
        $user->is_login = '0';
        $user->is_admin = '1';
        $user->lecturer_id = '1';
        $user->save();

        $user = new User();
        $user->email = 'sahlun@lecturer.com';
        $user->password = Hash::make('12345678');
        $user->role_id = '2';
        $user->is_login = '0';
        $user->is_admin = '1';
        $user->lecturer_id = '2';
        $user->save();
    }
}
