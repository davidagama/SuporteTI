<?php

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->hasAccess('private-post-resource')) {
            return true;
        }
    }

    /**
     * Indicates whether should check for modifications
     * between viewing and updating a resource.
     *
     * @return  bool
     */
    public static function trafficCop(): bool
    {
        return false;
    }

    /**
     * Get the descriptions for the screen.
     *
     * @return null|string
     */
    public static function description(): ?string
    {
        return null;
    }

    
}
