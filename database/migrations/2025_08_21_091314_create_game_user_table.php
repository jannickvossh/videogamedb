<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('game_id');
            $table->boolean('played')->default(0);
            $table->boolean('enjoyed')->default(1);
            $table->boolean('favorite')->default(0);
            $table->boolean('owns_physically')->default(0);
            $table->boolean('owns_digitally')->default(0);
            $table->boolean('finished')->default(0);
            $table->boolean('completed')->default(0);
            $table->date('finished_on')->nullable();
            $table->date('completed_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_user');
    }
};
