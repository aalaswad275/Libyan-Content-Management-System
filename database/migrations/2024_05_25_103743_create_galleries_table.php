<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // title of the gallery

            $table->string('slug'); // slug for the gallery (e.g. for URL routing)

            $table->text('description'); // description of the gallery

            $table->string('cover_image'); // path to the cover image of the gallery

            $table->foreignIdFor(User::class)->constrained(
                table: 'users', indexName: 'gallery_user_id'
            )->cascadeOnDelete(); //->integer('user_id')->unsigned(); // foreign key referencing the users table
            
            $table->timestamps();
            // add foreign key constraint


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
