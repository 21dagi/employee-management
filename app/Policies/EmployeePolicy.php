<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployeePolicy
{
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }
    
    public function create(User $user)
    {
        return $user->isAdmin();
    }
    
    public function update(User $user, Employee $employee)
    {
        return $user->isAdmin();
    }
    
    public function delete(User $user, Employee $employee)
    {
        return $user->isAdmin();
    }

    
    public function restore(User $user, Employee $employee): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employee $employee): bool
    {
        //
    }
}
