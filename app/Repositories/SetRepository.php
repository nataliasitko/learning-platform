<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Set;
use mysql_xdevapi\Collection;

class SetRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Set::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->paginate(7);
    }

    /**
     * Get all of the tasks for a given user.
     *
     * @return Collection
     */
    public function every()
    {
        return Set::paginate(8)
            ->sortBy('created_at'); //asc default jest tez sortByDesc('field')
    }

}
