<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Page;
use App\Models\User;
use App\Policies\CommentPolicy;
use App\Policies\PagePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Page::class => PagePolicy::class,
    ];



    public function boot(): void
    {
    }
}
