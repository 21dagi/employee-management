<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Performance;

class PerformancePolicy
{
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->role_id === 2; // role_id instead of role_is
    }
    
    public function view(User $user)
    {
        return $user->isAdmin() || $user->role_id === 2; // Consistent role checks
    }
    
    public function manage(User $user)
    {
        return $user->isAdmin(); // Only admins can manage
    }
}