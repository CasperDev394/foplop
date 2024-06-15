<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Bidder;
use App\Models\Broker;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class RelationServiceProvider extends ServiceProvider
{
    public function register(){ }
    public function boot()
    {
        Relation::morphMap([
            'ADMIN' => Admin::class,
            'BROKER' => Broker::class,
            'BIDDER' => Bidder::class,
        ]);
    }
}
