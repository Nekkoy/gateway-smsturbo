<?php

namespace Nekkoy\GatewaySmsturbo\Services;

use Nekkoy\GatewaySmsturbo\DTO\ConfigDTO;

/**
 *
 */
class GatewayService
{
    protected array $config;

    public function __construct()
    {
        $this->config = config('gateway-smsturbo', []);
    }

    /**
     * @return ConfigDTO
     */
    public function getConfig()
    {
        return new ConfigDTO($this->config);
    }
}
