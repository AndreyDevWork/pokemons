<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpKernel\Profiler\Profile;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = "users";
    protected $fillable = ["username", "email", "password"];
    protected $hidden = ["password"];
    protected $casts = [
        "email_verified_at" => "datetime",
        "password" => "hashed",
    ];

    public function findForPassport($username)
    {
        return $this->where("username", $username)->first();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
