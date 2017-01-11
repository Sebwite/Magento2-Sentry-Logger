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

        if ( php_sapi_name() !== 'cli' )
        {
            $root = $_SERVER[ 'DOCUMENT_ROOT' ];

            if ( is_file($envFile = $root . '/app/etc/env.php') )
            {
                $env = include $envFile;
            }
            else
            {
                $env = include $root . '/../app/etc/env.php';;
            }

            $isDeveloper = array_key_exists('MAGE_MODE', $env) && $env[ 'MAGE_MODE' ] === 'developer';

            // Only log to Sentry if the use is not in development mode
            if ( !$isDeveloper )
            {
                $ravenDNS = array_key_exists('raven_dns', $env) ? $env[ 'raven_dns' ] : null;
            }
        }

        parent::__construct($ravenDNS, $options);
    }
}
