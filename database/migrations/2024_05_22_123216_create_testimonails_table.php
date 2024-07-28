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
        Schema::create('testimonails', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('title');

            $table->text('testimonial');

            $table->string('image');

            $table->boolean('is_active')->default(true);

            $table->integer('order')->default(0);

            $table->integer('views')->default(0); // new column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonails');
    }
};
