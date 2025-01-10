<?php

// Classe para gerenciamento de clientes
namespace Cristyanhenrich\AsaasSdk\Services;

use Cristyanhenrich\AsaasSdk\Http\HttpClient;

class SubscriptionService
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
     * Cria uma assinatura.
     *
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function createSubscription(array $data): array
    {
        try {
            return $this->httpClient->post('subscriptions', $data);
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Lista todas as assinaturas.
     *
     * @param array $query Parâmetros de consulta opcionais
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function listSubscriptions(array $query = []): array
    {
        try {
            return $this->httpClient->get('subscriptions', $query);
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Busca uma assinatura pelo ID.
     *
     * @param string $id ID da assinatura.
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function getSubscriptionById(string $id): array
    {
        try {
            return $this->httpClient->get("subscriptions/{$id}");
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Atualiza uma assinatura.
     *
     * @param string $id ID da assinatura.
     * @param array $data Dados da assinatura.
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function updateSubscription(string $id, array $data): array
    {
        try {
            return $this->httpClient->put("subscriptions/{$id}", $data);
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Deleta uma assinatura.
     *
     * @param string $id ID da assinatura.
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function deleteSubscription(string $id): array
    {
        try {
            return $this->httpClient->delete("subscriptions/{$id}");
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Pegar os pagamentos de uma assinatura.
     *
     * @param string $id ID da assinatura.
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function getSubscriptionPayments(string $id): array
    {
        try {
            return $this->httpClient->get("subscriptions/{$id}/payments");
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }
}
