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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('species_id')->constrained('species')->onDelete('cascade');
            $table->integer('year_age');
            $table->integer('month_age');
            $table->string('gender');
            $table->decimal('weight', 8, 2);
            $table->decimal('height', 8, 2);
            $table->foreignId('habitat_id')->constrained('habitats')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
