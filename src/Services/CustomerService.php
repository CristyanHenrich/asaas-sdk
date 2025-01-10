<?php

// Classe para gerenciamento de clientes
namespace Cristyanhenrich\AsaasSdk\Services;

use Cristyanhenrich\AsaasSdk\Http\HttpClient;

class CustomerService
{
    private $httpClient;

    /**
     * Inicializa o serviço com um cliente HTTP.
     *
     * @param HttpClient $httpClient Cliente HTTP configurado.
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Cadastra um novo cliente.
     *
     * @param array $data Dados do cliente.
     * @return array Resposta da API.
     * @throws \Exception Se ocorrer um erro.
     */
    public function createCustomer(array $data): array
    {
        return $this->httpClient->post('customers', $data);
    }

    /**
     * Lista todos os clientes.
     *
     * @param array $query Parâmetros de consulta opcionais
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function listCustomers(array $query = []): array
    {
        return $this->httpClient->get('customers', $query);
    }

    /**
     * Busca um cliente pelo ID.
     *
     * @param string $id ID do cliente.
     * @return array Resposta da API.
     * @throws \Exception Se ocorrer um erro.
     */
    public function getCustomerById(string $id): array
    {
        return $this->httpClient->get("customers/{$id}");
    }

    /**
     * Atualiza um cliente.
     *
     * @param string $id ID do cliente.
     * @param array $data Dados do cliente.
     * @return array Resposta da API.
     * @throws \Exception Se ocorrer um erro.
     */
    public function updateCustomer(string $id, array $data): array
    {
        return $this->httpClient->put("customers/{$id}", $data);
    }

    /**
     * Deleta um cliente.
     *
     * @param string $id ID do cliente.
     * @return array Resposta da API.
     * @throws \Exception Se ocorrer um erro.
     */
    public function deleteCustomer(string $id): array
    {
        return $this->httpClient->delete("customers/{$id}");
    }

    /**
     * Restaura um cliente excluido.
     *
     * @param string $id ID do cliente.
     * @return array Resposta da API.
     * @throws \Exception Se ocorrer um erro.
     */
    public function restoreCustomer(string $id): array
    {
        return $this->httpClient->post("customers/{$id}/restore", []);
    }

    /**
     * Busca as notificações de um cliente.
     *
     * @param string $id ID do cliente.
     * @return array Resposta da API.
     * @throws \Exception Se ocorrer um erro.
     */
    public function getCustomerNotifications(string $id): array
    {
        return $this->httpClient->get("customers/{$id}/notifications");
    }
}
