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
        Schema::create('buckets', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->string('category'); // travel, food, etc.
    $table->string('status'); // planned, done, progress, dream
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buckets');
    }
};
