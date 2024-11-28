<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();

    }
    // public function handleGoogleCallback()
    // {
    //     try {
    //         $user = Socialite::driver('google')->user();
    //         $finduser = User::where('google_id', $user->id)->first(); 

    //         if($finduser) {
    //             Auth::login($finduser);

    //             return redirect()->intended(route('main'));
    //         } else {
    //             $newUser = User::create([
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'role' => 'user',
    //                 'google_id' => $user->id,
    //                 'password' => encrypt('123456789')
    //             ]);

    //             Auth::login($newUser);

    //             return redirect()->intended(route('main'));
    //         }
    //     } catch(Exception $e) {
    //         dd($e->getMessage());
    //     }      
    // }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)
                        ->orwhere('google_id', $user->email)
                        ->first(); 

            if($finduser) {
                Auth::login($finduser);

                return redirect()->intended(route('main'));
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => 'user',
                    'google_id' => $user->id,
                    'password' => encrypt('123456789')
                ]);

                Auth::login($newUser);

                return redirect()->intended(route('main'));
            }
        } catch(Exception $e) {
            return redirect()->route('account.login')->with('error', 'Something went wrong. Please try again.'); }      
    }
}
