<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatGroup extends Model
{
    use HasFactory;

    protected $table = "chat_groups";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
