<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){
                Auth::login($finduser);

                return redirect()->intended('/');

            }else{
                $emailCheck = User::where('email', $user->email)->first();
                if($emailCheck == null){
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'status' => 1,
                        'profile_photo_path' => 'default.png',
                        'password' => Hash::make('12345678')
                    ]);

                    $newUser->assignRole('peserta');
                    Auth::login($newUser);

                }else{
                    User::where('email', $user->email)->update(['google_id' => $user->id ]);
                    $update = User::where('email', $user->email)->first();
                    Auth::login($update);
                }

                return redirect()->intended('/');
            }

        } catch (Exception $e) {
            Alert::error('Peringatan', $e->getMessage());
            return redirect()->route('login');
        }
    }
}
