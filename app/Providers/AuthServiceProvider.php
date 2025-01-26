<?php

namespace App\Providers;

use App\Models\Academician;
use App\Models\Milestone;
use App\Policies\AcademicianPolicy;
use App\Policies\MilestonePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider; // Ensure correct base class
use Illuminate\Support\Facades\Gate;
use App\Models\Grant;
use App\Policies\GrantPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Grant::class => GrantPolicy::class, // Register your policies here
        Academician::class => AcademicianPolicy::class,
    ];

    /**
     * Register any authentication/authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies(); // Ensure this is correctly defined in the base class
    }
}
