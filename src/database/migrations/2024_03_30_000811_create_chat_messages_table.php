<?php

use App\Models\Chat\ChatGroup;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("chat_messages", function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ChatGroup::class);
            $table->foreignIdFor(User::class);
            $table->text("message");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("chat_messages");
    }
};
