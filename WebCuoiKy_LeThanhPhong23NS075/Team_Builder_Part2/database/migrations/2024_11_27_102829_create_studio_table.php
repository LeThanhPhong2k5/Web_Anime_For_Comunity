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
        Schema::create('studio', function (Blueprint $table) {
            $table->id();
            $table->string('Studio')->unique();
            $table->timestamps();
        });
        DB::table('studio')->insert([
            ['Studio' => 'Madhouse'],
            ['Studio' => 'Kyoto Animation'],
            ['Studio' => 'Bones'],
            ['Studio' => 'MAPPA'],
            ['Studio' => 'Sunrise'],
            ['Studio' => 'Toei Animation'],
            ['Studio' => 'A-1 Pictures'],
            ['Studio' => 'Studio Ghibli'],
            ['Studio' => 'Production I.G'],
            ['Studio' => 'Trigger'],
            ['Studio' => 'Silver Link'],
            ['Studio' => 'P.A. Works'],
            ['Studio' => 'Wit Studio'],
            ['Studio' => 'Studio Deen'],
            ['Studio' => 'David Production'],
            ['Studio' => 'White Fox'],
            ['Studio' => 'CloverWorks'],
            ['Studio' => 'J.C. Staff'],
            ['Studio' => 'Liden Films'],
            ['Studio' => 'Xebec'],
            ['Studio' => 'Geneon Universal'],
            ['Studio' => 'Funimation'],
            ['Studio' => 'Studio Pierrot'],
            ['Studio' => 'Aniplex'],
            ['Studio' => 'NUT'],
            ['Studio' => 'Zexcs'],
            ['Studio' => 'Brain’s Base'],
            ['Studio' => 'VIZ Media'],
            ['Studio' => 'KyoAni'],
            ['Studio' => 'Shaft'],
            ['Studio' => 'Millepensee'],
            ['Studio' => 'Studio Gonzo'],
            ['Studio' => 'Production Reed'],
            ['Studio' => 'Studio Lush'],
            ['Studio' => 'TMS Entertainment'],
            ['Studio' => 'Gonzo'],
            ['Studio' => 'Studio 4°C'],
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studio');
    }
};
