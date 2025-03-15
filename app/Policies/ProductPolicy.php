<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Anyone can view the list
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool
    {
        // Anyone can view the item
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // admin access only
        return $user->role == "administrator";
    }

    /**
     * Determine whether the user can paginate model list.
     */
    public function paginate(User $user): bool
    {
        // logged-in access only
        return $user != null;
    }

    /**
     * Determine whether the user can search models.
     */
    public function search(User $user): bool
    {
        // logged-in access only
        return $user != null;
    }

    /**
     * Determine whether the user can access /admin.
     */
    public function accessAdmin(User $user): bool
    {
        // admin access only
        return $user->role == "administrator";
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        // admin access only
        return $user->role == "administrator";
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        // admin access only
        return $user->role == "administrator";
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        // admin access only
        return $user->role == "administrator";
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        // admin access only
        return $user->role == "administrator";
    }
}
