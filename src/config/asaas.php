<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configurações do Assas
    |--------------------------------------------------------------------------
    |
    | Aqui estão as configurações padrão do pacote. Os usuários podem
    | sobrescrever essas configurações publicando o arquivo.
    |
    */

    // Producao
    'production' => env('ASAAS_PRODUCTION', false),

    // URL da API Produção
    'api_url_production' => env('ASAAS_API_PRODUCTION', 'https://api.asaas.com/'),

    // URL da API Sandbox
    'api_url_sandbox' => env('ASAAS_API_SANDBOX', 'https://sandbox.asaas.com/api/v3/'),

    // Chave de acesso à API
    'api_key' => env('ASAAS_API_KEY', ''),
];
