<?php

return [
    "enabled" => env('SMSTURBO_ENABLED', false),
    "api_key" => env('SMSTURBO_API_KEY', ''),
    "name_sms" => env('SMSTURBO_SMS_NAME', ''),
    "name_viber" => env('SMSTURBO_VIBER_NAME', ''),
    "transactional" => env('SMSTURBO_TRANSACTIONAL', 0),
    "priority" => env('SMSTURBO_PRIORITY', 1),
    "prefix" => env('SMSTURBO_PREFIX', "any"),
    "tags" => env('SMSTURBO_TAGS', '#mobizone'),
    "default" => env('SMSTURBO_DEFAULT', false),
    "devmode" => env('SMSTURBO_DEVMODE', false),
];
