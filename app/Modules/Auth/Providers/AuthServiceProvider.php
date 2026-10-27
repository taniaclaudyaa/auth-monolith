<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(base_path('app/Modules/Auth/routes/web.php'));
        $this->loadRoutesFrom(base_path('app/Modules/Auth/routes/auth.php'));
    }
}