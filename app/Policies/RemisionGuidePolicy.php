<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RemisionGuide;
use Illuminate\Auth\Access\HandlesAuthorization;

class RemisionGuidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_remision::guide');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RemisionGuide  $remisionGuide
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RemisionGuide $remisionGuide): bool
    {
        return $user->can('view_remision::guide');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_remision::guide');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RemisionGuide  $remisionGuide
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RemisionGuide $remisionGuide): bool
    {
        return $user->can('update_remision::guide');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RemisionGuide  $remisionGuide
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RemisionGuide $remisionGuide): bool
    {
        return $user->can('delete_remision::guide');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_remision::guide');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RemisionGuide  $remisionGuide
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RemisionGuide $remisionGuide): bool
    {
        return $user->can('force_delete_remision::guide');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_remision::guide');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RemisionGuide  $remisionGuide
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RemisionGuide $remisionGuide): bool
    {
        return $user->can('restore_remision::guide');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_remision::guide');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RemisionGuide  $remisionGuide
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, RemisionGuide $remisionGuide): bool
    {
        return $user->can('replicate_remision::guide');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_remision::guide');
    }

}
