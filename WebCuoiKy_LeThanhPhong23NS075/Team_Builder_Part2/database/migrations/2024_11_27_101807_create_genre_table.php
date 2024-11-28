<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre', function (Blueprint $table) {
            $table->id();
            $table->string('The_loai')->unique();
            $table->timestamps();
        });

        DB::table('genre')->insert([
            ['The_loai' => 'Action'],
            ['The_loai' => 'Adventure'],
            ['The_loai' => 'Comedy'],
            ['The_loai' => 'Drama'],
            ['The_loai' => 'Fantasy'],
            ['The_loai' => 'Slice of Life'],
            ['The_loai' => 'Romance'],
            ['The_loai' => 'Horror'],
            ['The_loai' => 'Thriller'],
            ['The_loai' => 'Mystery'],
            ['The_loai' => 'Sci-Fi'],
            ['The_loai' => 'Supernatural'],
            ['The_loai' => 'Magic'],
            ['The_loai' => 'Historical'],
            ['The_loai' => 'Mecha'],
            ['The_loai' => 'Sports'],
            ['The_loai' => 'Music'],
            ['The_loai' => 'Shounen'],
            ['The_loai' => 'Shoujo'],
            ['The_loai' => 'Seinen'],
            ['The_loai' => 'Josei'],
            ['The_loai' => 'Ecchi'],
            ['The_loai' => 'Yaoi'],
            ['The_loai' => 'Yuri'],
            ['The_loai' => 'Psychological'],
            ['The_loai' => 'School'],
            ['The_loai' => 'Superhero'],
            ['The_loai' => 'Action-Adventure'],
            ['The_loai' => 'Action-Comedy'],
            ['The_loai' => 'Action-Romance'],
            ['The_loai' => 'Drama-Romance'],
            ['The_loai' => 'Fantasy-Romance'],
            ['The_loai' => 'Sci-Fi-Adventure'],
            ['The_loai' => 'Harem'],
            ['The_loai' => 'Reverse Harem'],
            ['The_loai' => 'Isekai'],
            ['The_loai' => 'Gore'],
            ['The_loai' => 'Psychological-Thriller'],
            ['The_loai' => 'Military'],
            ['The_loai' => 'Parody'],
            ['The_loai' => 'A slice of life'],
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre');
    }
};
