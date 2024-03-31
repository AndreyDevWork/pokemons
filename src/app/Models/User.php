<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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

    protected $with = ["profile"];

    public function findForPassport($username)
    {
        return $this->where("username", $username)->first();
    }

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }
}
