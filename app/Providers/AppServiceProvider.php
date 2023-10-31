<?php

namespace App\Providers;

// use App\Models\Instructor;
// use App\Observers\InstructorObserver;

// use App\Models\Instructor;
// use App\Observers\InstructorObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Relations\Relation;

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
            'evaluatee' =>'App\Models\Evaluatee',
            'user'=> 'App\Models\User',
        ]);
    }
}
