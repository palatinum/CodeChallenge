<?php

namespace App\Providers;

use CodeChallenge\Client\Infrastructure\Outputadapter\Eloquent\ClientRepository;
use CodeChallenge\Client\Infrastructure\Outputport\ClientRepositoryInterface;
use CodeChallenge\Lead\Infrastructure\Outputadapter\Eloquent\LeadRepository;
use CodeChallenge\Lead\Infrastructure\Outputadapter\Services\GetLeadScoreService;
use CodeChallenge\Lead\Infrastructure\Outputport\LeadRepositoryOutputportInterface;
use CodeChallenge\Lead\Infrastructure\Outputport\Services\GetLeadScoreServiceOutputportInterface;
use Illuminate\Support\ServiceProvider;

class OutputadapterServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LeadRepositoryOutputportInterface::class, LeadRepository::class);
        $this->app->bind(GetLeadScoreServiceOutputportInterface::class, GetLeadScoreService::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
    }
}
