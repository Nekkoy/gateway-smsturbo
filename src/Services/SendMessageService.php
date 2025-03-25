<?php

namespace Nekkoy\GatewaySmsturbo\Services;

use Nekkoy\GatewayAbstract\Services\AbstractSendMessageService;
use Nekkoy\GatewaySmsturbo\DTO\ConfigDTO;

/**
 *
 */
class SendMessageService extends AbstractSendMessageService
{
    /** @var string */
    protected $api_url = 'https://api.turbosms.ua';

    /** @var ConfigDTO */
    protected $config;

    /**  */
    protected function init() {
        $this->header = [
            'Content-Type: application/json',
            sprintf('Authorization: Bearer %s', $this->config->api_key)
        ];
    }

    /** @return string */
    protected function url()
    {
        return $this->api_url . '/message/send.json';
    }

    /** @return mixed */
    protected function data()
    {
        $transactional = false;
        if( !empty($this->config->transactional) ) {
            $transactional = true;
        }

        $request = [
            "recipients" => [$this->message->destination],
            "is_transactional" => $transactional,
            "sms" => [
                "sender" => $this->config->name_sms,
                "text" => $this->message->text
            ]
        ];

        if( !empty($this->config->name_viber) ) {
            $request["viber"] = [
                "sender" => $this->config->name_viber,
                "text" => $this->message->text
            ];
        }

        return json_encode($request);
    }

    /** @return mixed */
    protected function development()
    {
        return '{
            "response_code": 802,
            "response_status": "SUCCESS_MESSAGE_PARTIAL_ACCEPTED",
            "response_result": [
                {
                    "phone": "отримувач_2",
                    "response_code": 0,
                    "message_id": "f83f8868-5e46-c6cf-e4fb-615e5a293754",
                    "response_status": "OK"
                },
                {
                    "phone": "отримувач_1",
                    "response_code": 406,
                    "message_id": null,
                    "response_status": "NOT_ALLOWED_RECIPIENT_COUNTRY"
                }
            ]
        }';
    }

    /** @return array */
    protected function response()
    {
        $response = json_decode($this->response, true);
        if( isset($response["response_result"]) && is_array($response["response_result"])) {
            $this->response_code = 0;
        } else {
            $this->response_code = $response["response_code"];
            $this->response_message = $response["response_status"];
        }

        if( isset($response["response_result"][0]) && !empty($response["response_result"][0]) ) {
            $this->message_id = $response["response_result"][0]["message_id"];
        }

        return $response;
    }
}
