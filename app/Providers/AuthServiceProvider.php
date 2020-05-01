<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('StaffAdminAuthorize',function (User $user){
           return $user->user_type === 'staff' or $user->user_type === 'admin';
        });
        Gate::define('AdminAuthorize',function (User $user){
            return $user->user_type === 'admin';
        });
        Gate::define('TutorStudentAuthorize',function (User $user){
            return $user->user_type === 'tutor' or $user->user_type === 'student';
        });

        Gate::define('TutorClassroomAuthorize',function (User $user){
            return $user->classroomTutor->tutor_id === $user->tutor->id;
        });
        Gate::define('StudentTutorClassroomAuthorize',function (User $user){
            if($user->user_type ==='tutor'){
                return $user->classroomTutor->tutor_id === $user->tutor->id;
            }else if($user->user_type == 'student'){
                return $user->classroomStudent->student_id === $user->student->id;
            }
        });
    }
}
