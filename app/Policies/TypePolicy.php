<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Type;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypePolicy
{
    use HandlesAuthorization;
    
    public function view(AuthUser $authUser, Type $type): bool
    {
        return $authUser->can('View:Type');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Type');
    }

    public function update(AuthUser $authUser, Type $type): bool
    {
        return $authUser->can('Update:Type');
    }

    public function delete(AuthUser $authUser, Type $type): bool
    {
        return $authUser->can('Delete:Type');
    }

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Type');
    }

}