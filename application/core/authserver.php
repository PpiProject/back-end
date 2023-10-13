<?php

require_once 'vendor/autoload.php';

use \Firebase\JWT\JWT;

class AuthServer
{
    protected $secretKey;
    protected $timeCreate;
    protected $selfLife;

    public function __construct()
    {
        $key = require 'secretAuth.php';
        $this->secretKey = $key['secretKey'];
        $this->timeCreate = new DateTime();
        $this->selfLife = 900000;
    }

    public function generateToken ($userName, $idRight)
    {
        $payload = [
            "iat" => $this->timeCreate,
            "nbf" => $this->selfLife,
            'userName' => $userName,
            'idRight' => $idRight
        ];

        return JWT::encode($payload, $this->secretKey, 'HS512');
    }
}