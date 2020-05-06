<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Staff;
use \App\Student;
use \App\Tutor;
use \App\Classroom;
use \App\Post;
use \App\Comment;
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
            'phone' => '12345678909',
            'address' => 'admin house 123',
            'user_id' => 1,
            'status' => 1,
            'profile_image' => 'default.jpg',
            'DoB' => '1999-12-24',
            'gender' => 'Male',
        ]);
        //create example staff and other user (these seeder ain't have profile yet since i only made profile for admin)
        $staff = User::create([
            'email' => 'staff@example.com',
            'password' => Hash::make('staff123'),
            'user_type' => 'staff',
        ]);
        $staffProfile = Staff::create([
            'name' => 'John Staff',
            'phone' => '12345678908',
            'address' => 'staff house 123',
            'user_id' => 2,
            'status' => 1,
            'profile_image' => 'default.jpg',
            'DoB' => '1999-12-24',
            'gender' => 'Male',
        ]);
        $staff2 = User::create([
            'email' => 'staff2@example.com',
            'password' => Hash::make('staff123'),
            'user_type' => 'staff',
        ]);
        $staffProfile2 = Staff::create([
            'name' => 'John Staff 2',
            'phone' => '12345678907',
            'address' => 'staff2 house 123',
            'user_id' => 3,
            'status' => 1,
            'profile_image' => 'default.jpg',
            'DoB' => '1999-12-24',
            'gender' => 'Male',
        ]);

        //Student account
        $student = User::create([
            'email' => 'student@example.com',
            'password' => Hash::make('student123'),
            'user_type' => 'student',
        ]);
        $studentProfile = Student::create([
            'name' => 'John Student',
            'phone' => '12345678906',
            'address' => 'student house 123',
            'user_id' => 4,
            'status' => 1,
            'profile_image' => 'default.jpg',
            'DoB' => '1999-12-24',
            'gender' => 'Male',
        ]);
        $student2 = User::create([
            'email' => 'student2@example.com',
            'password' => Hash::make('student123'),
            'user_type' => 'student',
        ]);
        $student2Profile = Student::create([
            'name' => 'John Student2',
            'phone' => '12345678901',
            'address' => 'student2 house 123',
            'user_id' => 5,
            'status' => 1,
            'profile_image' => 'default.jpg',
            'DoB' => '1999-12-24',
            'gender' => 'Male',
        ]);

        //Tutor Account
        $tutor = User::create([
            'email' => 'tutor@example.com',
            'password' => Hash::make('tutor123'),
            'user_type' => 'tutor',
        ]);
        $tutorProfile = Tutor::create([
            'name' => 'Jane Tutor',
            'phone' => '12345678902',
            'address' => 'tutor house 123',
            'user_id' => 6,
            'status' => 1,
            'profile_image' => 'default.jpg',
            'DoB' => '1999-12-24',
            'gender' => 'Male',
        ]);
        $tutor2 = User::create([
            'email' => 'tutor2@example.com',
            'password' => Hash::make('tutor123'),
            'user_type' => 'tutor',
        ]);
        $tutor2Profile = Tutor::create([
            'name' => 'Jane Tutor2',
            'phone' => '12345678903',
            'address' => 'tutor2 house 123',
            'user_id' => 7,
            'status' => 1,
            'profile_image' => 'default.jpg',
            'DoB' => '1999-12-24',
            'gender' => 'Male',
        ]);

        $classroom1 = Classroom::create([
            'name' => 'Classroom1',
            'tutor_id' => 1,
            'student_id' => 1,
            'status' => 1,
        ]);


        $classroom2 = Classroom::create([
            'name' => 'Classroom2',
            'tutor_id' => 2,
            'student_id' => 2,
            'status' => 1,
        ]);

        $post1 = Post::create([
            'title' => 'Prepare for school',
            'content' => 'Hey guys, remember to do your home work',
            'classroom_id' => 1,
            'user_id' => 6,
            'status' => 1,
        ]);
        $post2 = Post::create([
            'title' => 'Bring your document!',
            'content' => 'Remember guys, tomorrow we have to bring Laravel document to learn about php',
            'classroom_id' => 2,
            'user_id' => 7,
            'status' => 1,
        ]);
        $cmt1 = Comment::create([
            'content' => 'We start at 8am is that right ms. Jane?',
            'post_id' => 1,
            'user_id' => 4,
            'status' => 1,
        ]);
        $cmt2 = Comment::create([
            'content' => 'Do we have to bring our Eloquent document ms.Jane?',
            'post_id' => 2,
            'user_id' => 5,
            'status' => 1,
        ]);

    }
}
