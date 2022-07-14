<?php
use App\Orchid\Resources\UserResource;
use Illuminate\Support\ServiceProvider;
use Orchid\Crud\Arbitrator;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Arbitrator $arbitrator)
    {
        $arbitrator->resources([
            UserResource::class,
        ]);
    }
}