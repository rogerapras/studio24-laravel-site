<?php

namespace App\Social;

use App\User;

class TwitterServiceProvider extends AbstractServiceProvider
{
    /**
     * Handle data.
     *
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        $user = $this->provider->user();

        $existingUser = User::where('provider_id', $user->id)->first();

        if ($existingUser) {
            return $this->login($existingUser);
        }

        $newUser = $this->register([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'provider' => 'twitter',
            'provider_id' => $user->id,
        ]);

        return $this->login($newUser);
    }
}
