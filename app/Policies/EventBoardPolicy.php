<?php
// app/Policies/EventBoardPolicy.php
namespace App\Policies;

use App\Models\User;
use App\Models\EventBoard;

class EventBoardPolicy
{
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->role_id === 2; // Admins and managers
    }
    
    public function create(User $user)
    {
        return $user->isAdmin(); // Only admins can create
    }
    
    public function view(User $user, EventBoard $event)
    {
        return $user->isAdmin() || $user->role_id === 2; // Admins and managers can view
    }
}