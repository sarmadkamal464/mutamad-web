<?php

namespace App\Traits;

use App\Models\Project;
use Laravel\Socialite\Facades\Socialite;

trait SocialTrait
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirectToLinkedIn()
    {
        return Socialite::driver('linkedin')
            ->stateless()
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')
            ->stateless()
            ->user();
        $name = $user->getName();
        $email = $user->getEmail();
        return redirect()->route('signup', ['name' => $name, 'email' => $email]);
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $name = $user->getName();
        $email = $user->getEmail();
        return redirect()->route('signup', ['name' => $name, 'email' => $email]);
    }

    public function handleLinkedInCallback()
    {
        $user = Socialite::driver('linkedin')
            ->stateless()
            ->user();
        $name = $user->name;
        $email = $user->email;
        return redirect()->route('signup', ['name' => $name, 'email' => $email]);
    }
}
