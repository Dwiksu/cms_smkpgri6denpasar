<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('school_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_id')
            ->constrained(table: 'abouts', indexName: 'school_values_about_id')
            ->cascadeOnDelete()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_values');
    }
};