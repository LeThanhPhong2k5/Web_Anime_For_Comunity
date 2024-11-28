<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('Hinh_Anh_Anime')->nullable();
            $table->string('Ten_Anime', 200);
            $table->string('Ten_Khac', 200);
            $table->string('The_loai');
            $table->longText('Mo_Ta');
            $table->string('Studio');
            $table->date('Ngay_Phat_Hanh')->nullable();
            $table->string('So_Tap')->nullable();
            $table->string('Thoi_Luong_Moi_Tap', 15);
            $table->string('Trang_Thai');
            $table->string('Duong_Dan');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
};
