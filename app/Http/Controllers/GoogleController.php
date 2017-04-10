<?php

namespace App\Http\Controllers;

use App\Google;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        // OAuth Two Providers
        $token = $user->token;
        $refreshToken = $user->refreshToken; // not always provided
        $expiresIn = $user->expiresIn;

//        dd($user);
        // All Providers
//        $user->getId();
//        $user->getNickname();
//        $user->getName();
//        $user->getEmail();
//        $user->getAvatar();

        $registeredUser = Google::query()->where('google_id',$user->getId())->first();

        if (!$registeredUser){
            $request->session()->put([
                'googleId' => $user->getId(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),
                'name' => $user->getName(),
                'nickname' => $user->getNickname(),
            ]);

            return redirect('/register');
        }
        else {
            $googleUser = Google::query()->where('google_id',$user->getId())->first();
            $accountUser = User::query()->where('identifier_key',$googleUser->user_id)->first();
            Auth::loginUsingId($accountUser->id,true);
            return redirect('/home');
        }
    }
}
