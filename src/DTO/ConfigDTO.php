<?php

namespace Nekkoy\GatewaySmsturbo\DTO;

use Nekkoy\GatewayAbstract\DTO\AbstractConfigDTO;

/**
 *
 */
class ConfigDTO extends AbstractConfigDTO
{
    /**
     * API KEY
     * @var string
     */
    public $api_key;

    /**
     * Имя при отправке через СМС
     * @var string
     */
    public $name_sms;

    /**
     * Имя при отправке через СМС
     * @var string
     */
    public $name_viber;

    /**
     * Прапорець транзаційного повідомлення: 1 - так, будь-які інші значення або відсутність цього параметру - ні
     * Відправку транзакційних повідомлень від загального відправника заборонено.
     * Усі транзакційні повідомлення, що відправляються на номери України, повинні відповідати заздалегідь зареєстрованим шаблонам.
     * Якщо при відправці транзакційного повідомлення не буде знайдено відповідний шаблон, то воно буде відхилено з кодом NOT_ALLOWED_MESSAGE_TRANSACTION_PATTERN.
     * Не виключені ситуації, коли шаблон буде знайдений у нас, але Viber з якихось причин не знайде його у себе, в такому випадку повідомлення буде протарифіковано як рекламне.
     * Ми намагаємося виявляти подібні випадки, щоб наші клієнти могли оперативно внести зміни в шаблон і отримати ціну транзакційного повідомлення.
     * @var int
     */
    public $transactional;

    /**
     * @var string
     */
    public $handler = \Nekkoy\GatewaySmsturbo\Services\SendMessageService::class;
}
