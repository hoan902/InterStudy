<?php

use Illuminate\Database\Seeder;
use \App\User;
use Illuminate\Support\Facades\Hash;
use App\Admin;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // User::truncate(); //This drop and create table
        //Add example admin for testing using 'php artisan db:seed'
        $admin = User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'user_type' => 'admin',
        ]);

        $adminProfile = Admin::create([
            'name' => 'Admin Name',
            'phone' => '1234567890',
            'address' => 'admin house 123',
            'user_id' => 1,
            'status' => 1,
            'profile_image' => 'default.jpg',
            'DoB' => '1999-12-24',
            'gender' => 'Male',
        ]);
        //create example staff and other user (these seeder ain't have profile yet since i only made profile for admin)
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
