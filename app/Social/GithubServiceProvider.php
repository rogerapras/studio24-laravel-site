<?php
/**
 * Date: 5/22/18
 * Time: 11:56 AM
 */

namespace App\Social;

use App\User;

class GithubServiceProvider extends AbstractServiceProvider
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

        if ($existingUser)
        {
            return $this->login($existingUser);
        }

        $newUser = $this->register([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'provider' => 'github',
            'provider_id' => $user->id,
        ]);

        return $this->login($newUser);
    }
}
