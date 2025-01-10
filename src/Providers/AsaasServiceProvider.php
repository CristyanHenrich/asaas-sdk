<?php

namespace Cristyanhenrich\AsaasSdk\Providers;

use Illuminate\Support\ServiceProvider;

use Cristyanhenrich\AsaasSdk\Http\HttpClient;

use Cristyanhenrich\AsaasSdk\Services\ChargeService;
use Cristyanhenrich\AsaasSdk\Services\PixService;
use Cristyanhenrich\AsaasSdk\Services\CustomerService;
use Cristyanhenrich\AsaasSdk\Services\SubscriptionService;

class AsaasServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/asaas.php' => config_path('asaas.php'),
        ], 'asaas-config');
    }

    public function register()
    {
        // Mescla configurações padrão
        $this->mergeConfigFrom(__DIR__ . '/../config/asaas.php', 'asaas');

        // Registra o serviço
        $this->app->bind('asaas.customer', function () {
            return new CustomerService(new HttpClient());
        });

        // Registra o serviço de Pix
        $this->app->bind('asaas.pix', function () {
            return new PixService(new HttpClient());
        });

        // Registra o serviço de cobranças
        $this->app->bind('asaas.charge', function () {
            return new ChargeService(new HttpClient());
        });

        // Registra o serviço de assinaturas
        $this->app->bind('asaas.subscription', function () {
            return new SubscriptionService(new HttpClient());
        });

        // Registra o Facade principal que encapsula os outros
        $this->app->bind('asaas', function ($app) {
            return new class {
                public function __call($method, $arguments)
                {
                    // Encaminha para o serviço apropriado
                    if (method_exists($customer = app('asaas.customer'), $method)) {
                        return $customer->$method(...$arguments);
                    }

                    if (method_exists($pix = app('asaas.pix'), $method)) {
                        return $pix->$method(...$arguments);
                    }

                    if (method_exists($charge = app('asaas.charge'), $method)) {
                        return $charge->$method(...$arguments);
                    }

                    if (method_exists($subscription = app('asaas.subscription'), $method)) {
                        return $subscription->$method(...$arguments);
                    }

                    throw new \BadMethodCallException("Método {$method} não encontrado.");
                }
            };
        });
    }
}
