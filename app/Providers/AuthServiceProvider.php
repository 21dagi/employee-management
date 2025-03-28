<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Employee;
use App\Models\Performance;
use App\Models\EventBoard;

use App\Policies\EmployeePolicy;
use App\Policies\EventBoardPolicy;

use App\Policies\PerformancePolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */

    protected $policies = [
        Performance::class => PerformancePolicy::class,
        Employee::class => EmployeePolicy::class,
        EventBoard::class => EventBoardPolicy::class,
    ];


    public function boot(): void
    {
        //
    }
}
