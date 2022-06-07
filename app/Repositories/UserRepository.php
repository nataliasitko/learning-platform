<?php

namespace App\Repositories;

use App\Models\User;
use mysql_xdevapi\Collection;

class UserRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @return Collection
     *
     */
    public function every()
    {
        return User::paginate(8); //asc default jest tez sortByDesc('field')
    }

    public function thisUser()
    {
        return view('profiles.showMyProfile');
    }

}
