<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can reserve a book.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reserve(User $user, Book $book)
    {
        return !$book->reserves()->where('returned', false)->exists();
    }

}
