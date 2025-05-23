<?php

// Classe para gerenciamento de clientes
namespace Cristyanhenrich\AsaasSdk\Services;

use Cristyanhenrich\AsaasSdk\Http\HttpClient;

class ChargeService
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
     * Cria uma cobrança.
     *
     * @param array $data Dados da cobrança.
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function createCharge(array $data): array
    {
        try {
            return $this->httpClient->post('payments', $data);
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Pega o QR Code de uma cobrança PIX.
     *
     * @param string $id ID da cobrança.
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function getPixQrCode(string $id): array
    {
        try {
            return $this->httpClient->get("payments/{$id}/pixQrCode");
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Pega o código de barras de um boleto.
     *
     * @param string $id ID da cobrança.
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function getBoletoBarcode(string $id): array
    {
        try {
            return $this->httpClient->get("payments/{$id}/identificationField");
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Lista todas as cobranças.
     *
     * @param array $query Parâmetros de consulta opcionais
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function listCharges(array $query = []): array
    {
        try {
            return $this->httpClient->get('payments', $query);
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Lista informacoes de pagamento de uma cobranca.
     *
     * @param string $id ID da cobranca.
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function getChargeById(string $id): array
    {
        try {
            return $this->httpClient->get("payments/{$id}/billingInfo");
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Pega o status de uma cobrança.
     *
     * @param string $id ID da cobrança.
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function getChargeStatusById(string $id): array
    {
        try {
            return $this->httpClient->get("payments/{$id}/status");
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }
}
