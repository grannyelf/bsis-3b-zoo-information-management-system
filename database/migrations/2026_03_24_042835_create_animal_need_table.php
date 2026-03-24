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
        Schema::create('animal_need', function (Blueprint $table) {
            $table->foreignId('animal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('need_id')->constrained()->cascadeOnDelete();

            $table->primary(['animal_id', 'need_id']); // composite key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_need');
    }
};
