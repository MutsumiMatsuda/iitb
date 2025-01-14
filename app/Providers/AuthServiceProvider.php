<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /*protected function mapAdminRoutes()
    {
        Route::prefix('admin')
             ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }
    */

    public function boot()
    {
        //parent::boot();
        //$this->mapAdminRoutes();
    }

}
