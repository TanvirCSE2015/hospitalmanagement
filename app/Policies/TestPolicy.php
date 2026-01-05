<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Test;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
{
    use HandlesAuthorization;
    
    public function view(AuthUser $authUser, Test $test): bool
    {
        return $authUser->can('View:Test');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Test');
    }

    public function update(AuthUser $authUser, Test $test): bool
    {
        return $authUser->can('Update:Test');
    }

    public function delete(AuthUser $authUser, Test $test): bool
    {
        return $authUser->can('Delete:Test');
    }

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Test');
    }

}