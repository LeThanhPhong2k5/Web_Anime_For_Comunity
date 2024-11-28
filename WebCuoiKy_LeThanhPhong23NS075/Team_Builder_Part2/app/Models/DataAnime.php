<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnime extends Model
{
    use HasFactory;

    protected $table = 'films';  
    protected $fillable = [
        'Hinh_Anh_Anime',
        'Ten_Anime',
        'Ten_Khac',
        'The_loai',
        'Mo_Ta',
        'Studio',
        'Ngay_Phat_Hanh',
        'So_Tap',
        'Thoi_Luong_Moi_Tap',
        'Trang_Thai',
    ];
    public $timestamps = true;
}
