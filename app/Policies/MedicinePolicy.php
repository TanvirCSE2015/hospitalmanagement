<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Medicine;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicinePolicy
{
    use HandlesAuthorization;
    
    public function view(AuthUser $authUser, Medicine $medicine): bool
    {
        return $authUser->can('View:Medicine');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Medicine');
    }

    public function update(AuthUser $authUser, Medicine $medicine): bool
    {
        return $authUser->can('Update:Medicine');
    }

    public function delete(AuthUser $authUser, Medicine $medicine): bool
    {
        return $authUser->can('Delete:Medicine');
    }

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Medicine');
    }

}