<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profiles";
    protected $fillable = [
        "date_of_birth",
        "firstname",
        "lastname",
        "user_id",
        "role_id",
    ];
    protected $with = ["user", "role"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(ProfileRole::class);
    }
}
