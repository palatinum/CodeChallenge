<?php

namespace App\Providers;

use CodeChallenge\Client\Application\CreateClientUseCase;
use CodeChallenge\Client\Infrastructure\Inputport\CreateClientInputportInterface;
use CodeChallenge\Lead\Application\CreateLeadUseCase;
use CodeChallenge\Lead\Application\DeleteLeadUseCase;
use CodeChallenge\Lead\Application\GetCreateLeadFormUseCase;
use CodeChallenge\Lead\Application\GetLeadByIdUseCase;
use CodeChallenge\Lead\Application\GetLeadScoreUseCase;
use CodeChallenge\Lead\Application\UpdateLeadUseCase;
use CodeChallenge\Lead\Infrastructure\Inputport\CreateLeadInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\DeleteLeadInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\GetCreateLeadFormInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadByIdInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadScoreInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\UpdateLeadInputportInterface;
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
        // Lead
        $this->app->bind(CreateLeadInputportInterface::class, CreateLeadUseCase::class);
        $this->app->bind(GetLeadScoreInputportInterface::class, GetLeadScoreUseCase::class);
        $this->app->bind(GetLeadByIdInputportInterface::class, GetLeadByIdUseCase::class);
        $this->app->bind(GetCreateLeadFormInputportInterface::class, GetCreateLeadFormUseCase::class);
        $this->app->bind(UpdateLeadInputportInterface::class, UpdateLeadUseCase::class);
        $this->app->bind(DeleteLeadInputportInterface::class, DeleteLeadUseCase::class);

        // Client
        $this->app->bind(CreateClientInputportInterface::class, CreateClientUseCase::class);
    }
}
