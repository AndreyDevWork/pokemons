<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("currencies", function (Blueprint $table) {
            $table->id();
            $table->string("num_code");
            $table->string("char_code");
            $table->integer("nominal");
            $table->string("name");
            $table->decimal("value", 10, 4);
            $table->decimal("vunit_rate", 10, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("currencies");
    }
};
