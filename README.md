# Asaas SDK for Laravel

[![Latest Stable Version](https://poser.pugx.org/cristyanhenrich/asaas-sdk/v/stable)](https://packagist.org/packages/cristyanhenrich/asaas-sdk)
[![Total Downloads](https://poser.pugx.org/cristyanhenrich/asaas-sdk/downloads)](https://packagist.org/packages/cristyanhenrich/asaas-sdk)
[![License](https://poser.pugx.org/cristyanhenrich/asaas-sdk/license)](https://packagist.org/packages/cristyanhenrich/asaas-sdk)

Este pacote fornece uma integração com a API do Asaas para Laravel, permitindo o gerenciamento de clientes, cobranças, assinaturas e Pix.

## Instalação

### Requisitos
- PHP 8.2 ou superior
- Laravel 9 ou superior
- GuzzleHTTP 7.4 ou superior

### Passos

1. Instale o pacote via Composer:
   ```bash
   composer require cristyanhenrich/asaas-sdk
   ```

2. Publique as configurações:
   ```bash
   php artisan vendor:publish --tag=asaas-config
   ```

3. Configure as variáveis de ambiente no arquivo `.env`:
   ```env
   ASAAS_PRODUCTION=true
   ASAAS_API_KEY=your_api_key_here
   ```

## Uso

### Configuração Inicial
Certifique-se de configurar corretamente as variáveis no arquivo `.env`. O pacote automaticamente detecta se deve usar o ambiente de produção ou sandbox com base no valor de `ASAAS_PRODUCTION`.

### Exemplo de Uso

#### Clientes
- Listar clientes:
  ```php
  use Asaas;

  $clientes = Asaas::listCustomers(['name' => 'Cristyan Henrich']);
  ```

- Criar um cliente:
  ```php
  $cliente = Asaas::createCustomer([
      'name' => 'Cristyan Henrich',
      'cpfCnpj' => '12345678900',
      'email' => 'cristyanhenrich16@gmail.com',
  ]);
  ```

#### Cobranças
- Criar uma cobrança:
  ```php
  $cobranca = Asaas::createCharge([
      'customer' => 'customer_id',
      'billingType' => 'BOLETO',
      'value' => 150.00,
      'dueDate' => '2025-01-31',
  ]);
  ```

#### Assinaturas
- Criar uma assinatura:
  ```php
  $assinatura = Asaas::createSubscription([
      'customer' => 'customer_id',
      'billingType' => 'CREDIT_CARD',
      'value' => 200.00,
      'nextDueDate' => '2025-02-01',
  ]);
  ```

#### Pix
- Listar chaves Pix:
  ```php
  $pixKeys = Asaas::listKeys();
  ```

## Estrutura de Configuração

Após publicar o arquivo de configuração, você pode encontrá-lo em `config/asaas.php`. Aqui estão as principais opções:
```php
return [
    'production' => env('ASAAS_PRODUCTION', false),
    'api_url_production' => env('ASAAS_API_PRODUCTION', 'https://api.asaas.com/'),
    'api_url_sandbox' => env('ASAAS_API_SANDBOX', 'https://sandbox.asaas.com/api/v3/'),
    'api_key' => env('ASAAS_API_KEY', ''),
];
```

## Registro Automático
Este pacote utiliza o `ServiceProvider` do Laravel para registrar serviços e aliases automaticamente.

## Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença
Este pacote é licenciado sob a [MIT License](LICENSE).

