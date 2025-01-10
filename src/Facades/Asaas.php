<?php

namespace Cristyanhenrich\AsaasSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Métodos de Clientes:
 * @method static array listCustomers(array $query = [])
 *
 * Parâmetros disponíveis para filtros (Query Params):
 * - offset: int (opcional) - Define o deslocamento para paginação. Ex: 0
 * - limit: int (opcional) - Número máximo de resultados por página. Ex: 10
 * - name: string (opcional) - Filtra clientes pelo nome. Ex: 'Cristyan Henrich'
 * - email: string (opcional) - Filtra clientes pelo e-mail. Ex: 'exemplo@exemplo.com'
 * - cpfCnpj: string (opcional) - Filtra clientes pelo CPF ou CNPJ. Ex: '99999999999'
 * - groupName: string (opcional) - Filtra clientes pelo nome do grupo. Ex: 'Grupo 1'
 * - externalReference: string (opcional) - Filtra clientes pela referência externa. Ex: '123456'
 *
 * @method static array createCustomer(array $data) Cadastra um novo cliente.
 *
 *     Campos disponíveis:
 *     - name: string
 *     - cpfCnpj: string
 *     - email?: string
 *     - phone?: string
 *     - mobilePhone?: string
 *     - address?: string
 *     - addressNumber?: string
 *     - complement?: string
 *     - province?: string
 *     - postalCode?: string
 *     - externalReference?: string
 *     - notificationDisabled?: bool
 *     - additionalEmails?: string
 *     - municipalInscription?: string
 *     - stateInscription?: string
 *     - observations?: string
 *     - groupName?: string
 *     - company?: string
 *     - foreignCustomer?: bool
 *
 * @method static array getCustomerById(string $id) Busca um cliente pelo ID.
 *
 * @method static array updateCustomer(string $id, array $data) Atualiza um cliente.
 *
 *     Campos disponíveis:
 *     - name?: string
 *     - cpfCnpj?: string
 *     - email?: string
 *     - phone?: string
 *     - mobilePhone?: string
 *     - address?: string
 *     - addressNumber?: string
 *     - complement?: string
 *     - province?: string
 *     - postalCode?: string
 *     - externalReference?: string
 *     - notificationDisabled?: bool
 *     - additionalEmails?: string
 *     - municipalInscription?: string
 *     - stateInscription?: string
 *     - observations?: string
 *     - groupName?: string
 *     - company?: string
 *     - foreignCustomer?: bool
 *
 * @method static array deleteCustomer(string $id) Deleta um cliente.
 *
 * @method static array restoreCustomer(string $id) Restaura um cliente excluido.
 *
 * @method static array getCustomerNotifications(string $id) Busca as notificações de um cliente.
 *
 * Métodos de Pix:
 * @method static array listKeys(array $query = [])
 *
 * Parâmetros disponíveis para filtros (Query Params):
 * - offset: int (opcional) - Define o deslocamento para paginação. Ex: 0
 * - limit: int (opcional) - Número máximo de resultados por página. Ex: 10
 * - status: string (opcional) - Filtra chaves pelo status. Ex: 'ACTIVE'
 * - statusList: string (opcional) - Filtra chaves por status. Ex: 'ACTIVE,INACTIVE'
 *
 * @method static array createRandomPixKey() Cria uma chave pix aleatória.
 *
 * Métodos de Cobranças:
 * @method static array createCharge(array $data) Cria uma cobrança.
 *
 *    Campos disponíveis:
 *      - customer: string - Identificador do cliente.
 *      - billingType: string - Tipo de cobrança.
 *      - value: number - Valor da cobrança.
 *      - dueDate: string - Data de vencimento no formato 'YYYY-MM-DD'.
 *      - description?: string - Descrição da cobrança.
 *      - daysAfterDueDateToRegistrationCancellation?: int32 - Dias após o vencimento para cancelamento automático.
 *      - externalReference?: string - Referência externa para controle.
 *      - installmentCount?: int32 - Número de parcelas.
 *      - totalValue?: number - Valor total da cobrança parcelada.
 *      - installmentValue?: number - Valor de cada parcela.
 *
 *    Descontos:
 *      - discount?: object - Detalhes do desconto.
 *          - value?: number - Valor do desconto.
 *          - dueDateLimit?: int32 - Limite de data para o desconto.
 *          - type?: string - Tipo de desconto (por exemplo, 'percentage' ou 'fixed').
 *
 *    Juros e Multa:
 *      - interest?: object - Juros aplicáveis.
 *          - value?: number - Valor percentual dos juros.
 *      - fine?: object - Multa por atraso.
 *          - value?: number - Valor da multa.
 *          - type?: string - Tipo de multa (por exemplo, 'percentage' ou 'fixed').
 *
 *    Serviço Postal:
 *      - postalService?: bool - Indica se o boleto deve ser enviado via correio.
 *
 *    Divisão de Valores (Split):
 *      - split?: array - Configurações para divisão de valores.
 *          - walletId: string - Identificador da carteira.
 *          - fixedValue?: number - Valor fixo a ser transferido.
 *          - percentualValue?: number - Percentual do valor total.
 *          - totalFixedValue?: number - Valor fixo total a ser transferido.
 *          - externalReference?: string - Referência externa.
 *          - description?: string - Descrição do split.
 *
 *    Callback para Resposta:
 *      - callback?: object - Configurações de retorno.
 *          - successUrl: string - URL para redirecionamento em caso de sucesso.
 *          - autoRedirect?: bool - Define se o redirecionamento automático será habilitado.
 *
 *    Para cobranças CARTÃO DE CRÉDITO:
 *      - creditCard?: object - Configurações para cobrança no cartão de crédito.
 *          - holderName: string - Nome do titular do cartão.
 *          - number: string - Número do cartão.
 *          - expiryMonth: string - Mês de expiração do cartão.
 *          - expiryYear: string - Ano de expiração do cartão.
 *          - ccv: string - Código de segurança do cartão.
 *     - creditCardHolderInfo?: object - Informações do titular do cartão.
 *          - name: string - Nome do titular do cartão.
 *          - email: string - E-mail do titular do cartão.
 *          - cpfCnpj: string - CPF ou CNPJ do titular do cartão.
 *          - postalCode: string - CEP do titular do cartão.
 *          - addressNumber: string - Número do endereço do titular do cartão.
 *          - addressComplement: string - Complemento do endereço do titular do cartão.
 *          - phone: string - Telefone do titular do cartão.
 *          - mobilePhone: string - Celular do titular do cartão.
 *     - creditCardToken?: string - Token do cartão de crédito.
 *     - authorizeOnly?: bool - Indica se a cobrança é apenas autorização.
 *     - remoteIp: string - IP do cliente.
 *
 * @method static array getPixQrCode(string $id) Pega o QR Code de uma cobrança PIX.
 *
 * @method static array listCharges(array $query = []) Lista todas as cobranças.
 *
 * Parâmetros disponíveis para filtros (Query Params):
 * - installment: int (opcional) - Filtrar pelo Identificador único do parcelamento
 * - offset: integer (opcional) - Define o deslocamento para paginação. Ex: 0
 * - limit: integer (opcional) - Número máximo de resultados por página. Ex: 10
 * - customer: string (opcional) - Filtrar pelo Identificador único do cliente
 * - customerGroupName: string (opcional) - Filtrar pelo nome do grupo do cliente
 * - billingType: string (opcional) - Filtrar por forma de pagamento
 * - status: string (opcional) - Filtrar por status da cobrança
 * - subscription: string (opcional) - Filtrar pelo Identificador único da assinatura
 * - externalReference: string (opcional) - Filtrar por referência externa
 * - paymentDate: string (opcional) - Filtrar por data de pagamento
 * - invoiceStatus: string (opcional) - Filtro para retornar cobranças que possuem ou não nota fiscal
 * - estimatedCreditDate: string (opcional) - Filtrar por data estimada de crédito
 * - pixQrCodeId: string (opcional) - Filtrar recebimentos originados de um QrCode estático utilizando o id gerado na hora da criação do QrCode
 * - anticipated: boolean (opcional) - Filtrar por cobranças antecipadas
 * - anticipable: boolean (opcional) - Filtrar por cobranças que podem ser antecipadas
 * - dateCreated[ge]: string (opcional) - Filtrar a partir da data de criação inicial
 * - dateCreated[le]: string (opcional) - Filtrar até a data de criação final
 * - paymentDate[ge]: string (opcional) - Filtrar a partir da data de recebimento inicial
 * - paymentDate[le]: string (opcional) - Filtrar até a data de recebimento final
 * - estimatedCreditDate[ge]: string (opcional) - Filtrar a partir da data de crédito estimada inicial
 * - estimatedCreditDate[le]: string (opcional) - Filtrar até a data estimada de crédito final
 * - dueDate[ge]: string (opcional) - Filtrar a partir da data de vencimento inicial
 * - dueDate[le]: string (opcional) - Filtrar até a data de vencimento final
 * - user: string (opcional) - Filtrar pelo endereço de e-mail do usuário que criou a cobrança
 *
 * Métodos de Assinaturas:
 * @method static array createSubscription(array $data) Cria uma assinatura.
 *
 *   Campos disponíveis:
 *    - customer: string - Identificador do cliente.
 *    - billingType: string - Tipo de cobrança.
 *    - value: number - Valor da cobrança.
 *    - nextDueDate: string - Data de vencimento no formato 'YYYY-MM-DD'.
 *
 *    Descontos:
 *      - discount?: object - Detalhes do desconto.
 *          - value?: number - Valor do desconto.
 *          - dueDateLimit?: int32 - Limite de data para o desconto.
 *          - type?: string - Tipo de desconto (por exemplo, 'percentage' ou 'fixed').
 *
 *    Juros e Multa:
 *      - interest?: object - Juros aplicáveis.
 *          - value?: number - Valor percentual dos juros.
 *      - fine?: object - Multa por atraso.
 *          - value?: number - Valor da multa.
 *          - type?: string - Tipo de multa (por exemplo, 'percentage' ou 'fixed').
 *
 *    - cycle: string - Ciclo de cobrança.
 *    - description?: string - Descrição da cobrança.
 *    - endDate?: object - Data limite para vencimento das cobranças.
 *    - maxPayments?: string - Número máximo de cobranças a serem geradas para esta assinatura.
 *    - externalReference?: string - Identificador da assinatura no seu sistema.
 *
 *    Divisão de Valores (Split):
 *      - split?: array - Configurações para divisão de valores.
 *          - walletId: string - Identificador da carteira.
 *          - fixedValue?: number - Valor fixo a ser transferido.
 *          - percentualValue?: number - Percentual do valor total.
 *          - totalFixedValue?: number - Valor fixo total a ser transferido.
 *          - externalReference?: string - Referência externa.
 *          - description?: string - Descrição do split.
 *
 *    Callback para Resposta:
 *      - callback?: object - Configurações de retorno.
 *          - successUrl: string - URL para redirecionamento em caso de sucesso.
 *          - autoRedirect?: bool - Define se o redirecionamento automático será habilitado.
 *
 *    Para cobranças CARTÃO DE CRÉDITO:
 *      - creditCard?: object - Configurações para cobrança no cartão de crédito.
 *          - holderName: string - Nome do titular do cartão.
 *          - number: string - Número do cartão.
 *          - expiryMonth: string - Mês de expiração do cartão.
 *          - expiryYear: string - Ano de expiração do cartão.
 *          - ccv: string - Código de segurança do cartão.
 *     - creditCardHolderInfo?: object - Informações do titular do cartão.
 *          - name: string - Nome do titular do cartão.
 *          - email: string - E-mail do titular do cartão.
 *          - cpfCnpj: string - CPF ou CNPJ do titular do cartão.
 *          - postalCode: string - CEP do titular do cartão.
 *          - addressNumber: string - Número do endereço do titular do cartão.
 *          - addressComplement: string - Complemento do endereço do titular do cartão.
 *          - phone: string - Telefone do titular do cartão.
 *          - mobilePhone: string - Celular do titular do cartão.
 *     - creditCardToken?: string - Token do cartão de crédito.
 *     - remoteIp: string - IP do cliente.
 *
 * @method static array listSubscriptions(array $query = []) Lista todas as assinaturas.
 *
 * Parâmetros disponíveis para filtros (Query Params):
 * - offset: int (opcional) - Define o deslocamento para paginação. Ex: 0
 * - limit: int (opcional) - Número máximo de resultados por página. Ex: 10
 * - customer: string (opcional) - Filtrar pelo Identificador único do cliente
 * - customerGroupName: string (opcional) - Filtrar pelo nome do grupo do cliente
 * - billingType: string (opcional) - Filtrar por forma de pagamento
 * - status: string (opcional) - Filtrar por status da cobrança
 * - deletedOnly: bool (opcional) - Filtrar por assinaturas excluídas
 * - includeDeleted: bool (opcional) - Incluir assinaturas excluídas
 * - externalReference: string (opcional) - Filtrar por referência externa
 * - order: string (opcional) - Ordenar resultados por um campo específico
 * - sort: string (opcional) - Ordenar resultados de forma ascendente ou descendente
 *
 * @method static array getSubscriptionById(string $id) Busca uma assinatura pelo ID.
 *
 * @method static array updateSubscription(string $id, array $data) Atualiza uma assinatura.
 *
 * @method static array deleteSubscription(string $id) Deleta uma assinatura.
 *
 * @method static array getSubscriptionPayments(string $id) Pegar os pagamentos de uma assinatura.
 *
 * @see \Cristyanhenrich\AsaasSdk\Services\ChargeService
 * @see \Cristyanhenrich\AsaasSdk\Services\CustomerService
 * @see \Cristyanhenrich\AsaasSdk\Services\PixService
 *
 */
class Asaas extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'asaas';
    }
}
