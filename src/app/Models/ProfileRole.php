<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileRole extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "profile_roles";
}
