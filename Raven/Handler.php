<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * License and copyright information bundled with this package in the LICENSE file
 */


namespace Sebwite\Sentry\Raven;

use Monolog\Handler\RavenHandler;
use Monolog\Logger;

class Handler extends RavenHandler
{
    public function __construct($ravenClient, $level = Logger::DEBUG, $bubble = true)
    {

        if ( is_array($ravenClient) && array_key_exists('instance', $ravenClient) )
        {
            $ravenClient = new $ravenClient['instance'];
        }

        parent::__construct($ravenClient, $level, $bubble);
    }
}