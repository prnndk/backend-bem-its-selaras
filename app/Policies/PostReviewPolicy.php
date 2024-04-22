<?php

namespace App\Policies;

use App\Models\PostReview;
use App\Models\User;

class PostReviewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isMedsi();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PostReview $postReview): bool
    {
        return $user->isAdmin() || $user->isMedsi();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isMedsi();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PostReview $postReview): bool
    {
        return $user->isAdmin() || $user->isMedsi();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PostReview $postReview): bool
    {
        return $user->isAdmin() || $user->isMedsi();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PostReview $postReview): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PostReview $postReview): bool
    {
        //
    }
}
