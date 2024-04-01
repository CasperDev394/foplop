<?php

namespace App\Providers;

use App\Services\Sidebar\SideBarFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\{Auth, Route};



class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
//        dd(Auth::user());
        view()->composer(['sidebar'], function ($view){
            $sidebar = new SideBarFactory(Auth::user());
            $view->with('tabs', $sidebar->getTabs());
        });

    }
}
