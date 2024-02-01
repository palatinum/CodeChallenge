<?php

namespace App\Providers;

use CodeChallenge\Lead\Application\CreateLeadUseCase;
use CodeChallenge\Lead\Application\GetLeadScoreUseCase;
use CodeChallenge\Lead\Infrastructure\Inputport\CreateLeadInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadScoreInputportInterface;
use Illuminate\Support\ServiceProvider;

class InputportServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreateLeadInputportInterface::class, CreateLeadUseCase::class);
        $this->app->bind(GetLeadScoreInputportInterface::class, GetLeadScoreUseCase::class);
    }
}
