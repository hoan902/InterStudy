<?php

use Illuminate\Database\Seeder;
use \App\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $admin = User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'user_type' => 'admin',
        ]);

//        $staff = User::create([
//            'email' => 'staff@example.com',
//            'password' => Hash::make('staff123'),
//            'user_type' => 'staff',
//        ]);
//
//        $student = User::create([
//            'email' => 'student@example.com',
//            'password' => Hash::make('student123'),
//            'user_type' => 'student',
//        ]);
//
//        $tutor = User::create([
//            'email' => 'tutor@example.com',
//            'password' => Hash::make('tutor123'),
//            'user_type' => 'tutor',
//        ]);
    }
}
