<?php

namespace App\Providers;

// use App\Models\Instructor;
// use App\Observers\InstructorObserver;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
        // Instructor::observe(InstructorObserver::class);
        Relation::morphMap([
            'Instructor' =>'App\Models\Instructor'
        ]);
    }
}
