<?php

use App\Http\Controllers\admin\anime\UpDataAnime as AdminAnimeUpDataAnime;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\MainController as AdminMainController;
use App\Http\Controllers\anime\UpDataAnime as AnimeUpDataAnime;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\auth\LoginGoogleController;
use App\Http\Controllers\UpDataAnime;
use App\Models\DataAnime;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Test
Route::get('/blue-archive', function () {
    return view('ANIME.blue_archive_the_animation');
});

//Khung chính
Route::get('/capnhatweb', function () {
    return view('capnhatweb');
})->name('capnhatweb');

// Route::get('/register', [AuthController::class, 'register'])->name('DangKy');
// Route::post('/register', [AuthController::class, 'registerPost'])->name('DangKySubmit');

Route::group(['prefix' => 'account'], function() {
   
    //Guest middleware
    Route::group(['middleware' => 'guest'], function() {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class,'register'])->name('account.DangKy');
        Route::post('process-register', [LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class,'authenticate'])->name('account.authenticate');
    });

    //Authenticated middleware
    Route::group(['middleware' => 'auth'], function() {
        Route::post('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('main', [MainController::class,'index'])->name('account.main');
    });
});

Route::get('main', [MainController::class,'index'])->name('main');

Route::group(['prefix' => 'admin'], function() { 
    
    //Guest middleware
    Route::get('login', [AdminLoginController::class, 'index'])->middleware('alreadyLoggedIn');
    Route::post('authenticate', [AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    //Authenticated middleware
    Route::get('admin_page', [AdminLoginController::class, 'pageAdmin'])->middleware('isLoggedIn');
    Route::get('logout', [AdminLoginController::class, 'logout']);
    //Chuyển tab
    Route::get('form', [AdminLoginController::class, 'tabForm'])->middleware('isLoggedIn');
    Route::get('table', [AdminLoginController::class, 'tabTable'])->middleware('isLoggedIn');

    //Up film anime 
    Route::post('/up-data-anime', [AdminAnimeUpDataAnime::class, 'upDataAnime'])->name('up-data-anime');
    //Chỉnh sửa film anime
    Route::put('/anime/{id}/update', [AdminAnimeUpDataAnime::class, 'update'])->name('update-anime');
    //Xóa thông tin về anime 
    Route::delete('/anime/{id}', [AdminAnimeUpDataAnime::class, 'delete'])->name('delete-anime');

});

$animeAll = DataAnime::all();

if (!empty($animeAll)) {
    foreach ($animeAll as $anime) {
        if (!empty($anime->Duong_Dan)) {
            Route::get('/' . $anime->Duong_Dan, function () use ($anime) {
                return view($anime->Duong_Dan);
            })->name($anime->Duong_Dan);
        }
    }
}



//Đăng nhập bằng tài khoản google
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-with-google');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);


// Tổng hợp anime
Route::get('/the-new-gate', function () {
    return view('ANIME.THENEWGATE', 
    ['title' => 'Xem phim The New Gate']);
})->name('THE_NEW_GATE');

Route::get('/kage-no-jitsuryokusha_ni_naritakute', function () {
    return view('ANIME.KAGENOJITSURYOKUSHANINARITAKUTE',
    ['title' => 'Xem phim Kage no jitsuryokusha ni naritakute']);
})->name('KAGE_NO_JITSURYOKUSHA_NI_NARITAKUTE');

Route::get('/kage-no-jitsuryokusha_ni_naritakute_2nd_season', function () {
    return view('ANIME.KAGENOJITSURYOKUSHANINARITAKUTE2NDSEASON',
    ['title' => 'Xem phim Kage no jitsuryokusha ni naritakute 2nd Season']);
})->name('KAGE_NO_JITSURYOKUSHA_NI_NARITAKUTE_2ND_SEASON');

Route::get('/eighty-six', function () {
    return view('ANIME.EIGHTYSIX',
    ['title' => 'Xem phim 86(eighty-six)']);
})->name('eighty-six');
Route::get('/kimetsu-no-yaiba', function () {
    return view('ANIME.KNY',
    ['title' => 'Xem phim Kimetsu no yaiba']);
})->name('KNY');

Route::get('/tsuki-ga-michibiku-isekai-douchuu', function () {
    return view('ANIME.TSUKIGAMICHIBIKUISEKAIDOUCHUU',
    ['title' => 'Xem phim Tsuki ga michibiku isekai douchuu']);
})->name('TSUKI-GA-MICHIBIKU-ISEKAI-DOUCHUU');

Route::get('/genjitsu-shugi-yuusha-no-oukoku-saikenki', function () {
    return view('ANIME.GENJITSUSHUGIYUUSHANOOUKOKUSAIKENKI',
    ['title' => 'Xem phim Genjitsu shugi yuusha no oukoku saikenki']);
})->name('GENJITSU-SHUGI-YUUSHA-NO-OUKOKU-SAIKENKI');

Route::get('/otonari-no-tenshi-sama-ni-itsunomanika-dame-ningen-ni-sareteita-ken', function () {
    return view('ANIME.OTONARINOTENSHI-SAMANIITSUNOMANIKADAMENINGENNISARETEITAKEN',
    ['title' => 'Xem phim Otonari no tenshi sama ni itsunomanika dame ningen ni sareteita ken']);
})->name('OTONARI-NO-TENSHI-SAMA-NI-ITSUNOMANIKA-DAME-NINGEN-NI-SARETEITA-KEN');

Route::get('/kimetsu-no-yaiba-hashira-geiko-hen', function () {
    return view('ANIME.KNY-HASHIRA-GEIKO-HEN',
    ['title' => 'Xem phim Kimetsu no yaiba: Hashira geiko hen']);
})->name('KNY-HASHIRA-GEIKO-HEN');

Route::get('/tsuki-ga-michibiku-isekai-douchuu-2nd-season', function () {
    return view('ANIME.TSUKIGAMICHIBIKUISEKAIDOUCHUU2NDSEASON',
    ['title' => 'Xem phim Tsuki ga michibiku isekai douchuu 2nd Season']);
})->name('TSUKI-GA-MICHIBIKU-ISEKAI-DOUCHUU-2ND-SEASON');

Route::get('/tensei-kizoku-kantei-sukiru-de-nariagaru', function () {
    return view('ANIME.TENSEIKIZOKUKANTEISUKIRUDENARIAGARU',
    ['title' => 'Xem phim Tensei kizoku kantei sukiru de nariagaru']);
})->name('tensei-kizoku-kantei-sukiru-de-nariagaru');

Route::get('/blue-archive-the-animation', function () {
    return view('ANIME.BLUEARCHIVETHEANIMATION',
    ['title' => 'Xem phim Blue archive the animation']);
})->name('BLUE-ARCHIVE-THE-ANIMATION');




