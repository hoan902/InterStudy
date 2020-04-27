<?php
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //    'email', 'password','user_type'
    //];

    // Using guarded instead
    protected $guarded = [];

    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Student()
    {
        return $this->hasOne(Student::class); // TODO: Change the autogenerated stub
    }
    public function Tutor()
    {
        return $this->hasOne(Tutor::class); // TODO: Change the autogenerated stub
    }
    public function Staff()
    {
        return $this->hasOne(Staff::class); // TODO: Change the autogenerated stub
    }
    public function Admin()
    {
        return $this->hasOne(Admin::class); // TODO: Change the autogenerated stub
    }
    public function Messages()
    {
        return $this->hasMany(Message::class);
    }
    public function Classroom()
    {
        return $this->hasMany(Classroom::class);
    }
    public function Chatroom()
    {
        return $this->hasMany(Chatroom::class);
    }
    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function Posts()
    {
        return $this->hasMany(Post::class);
    }
}
