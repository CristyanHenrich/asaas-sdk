<?php

// Classe para gerenciamento de clientes
namespace Cristyanhenrich\AsaasSdk\Services;

use Cristyanhenrich\AsaasSdk\Http\HttpClient;

class PixService
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
     * Lista todas chaves pix.
     *
     * @param array $query Parâmetros de consulta opcionais
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function listKeys(array $query = []): array
    {
        try {
            return $this->httpClient->get('pix/addressKeys', $query);
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }

    /**
     * Cria uma chave pix aleatoria.
     *
     * @return array Resposta da API
     * @throws \Exception Se ocorrer um erro.
     */
    public function createRandomPixKey(): array
    {
        try {
            return $this->httpClient->post('pix/addressKeys', [
                'type' => 'EVP'
            ]);
        } catch (\Exception $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }
    }
}
