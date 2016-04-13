<?php namespace Sebwite\Sentry\Raven;

use Raven_Client;

/**
 * Raven Client - Uses Raven DNS from env.php
 *
 * @package        Sebwite\Sentry
 * @author         Sebwite
 * @copyright      Copyright (c) 2015, Sebwite. All rights reserved
 */
class Client extends Raven_Client
{
    public function __construct()
    {
        $ravenDNS = null;
        $options  = [ ];

        if ( php_sapi_name() !== 'cli')
        {
            $env      = include $_SERVER[ 'DOCUMENT_ROOT' ] . '/../app/etc/env.php';
            $ravenDNS = array_key_exists('raven_dns', $env) ? $env[ 'raven_dns' ] : null;
        }

        parent::__construct($ravenDNS, $options);
    }
}