<?php

namespace AppBundle\Service;

use Predis\Client;
use Predis\PredisException;
use Symfony\Component\Security\Acl\Exception\Exception;

/**
 * Here you have to implement a CacheService with the operations below.
 * It should contain a failover, which means that if you cannot retrieve
 * data you have to hit the Database.
 **/
class CacheService
{

    private $redisConnection;

    /**
     * CacheService It'll be injected by container service.
     * @param string $host
     * @param integer $port
     * @param string $prefix
     * @param string $password
     */
    public function __construct($host, $port, $prefix, $password)
    {

        $this->redisConnection = new Client([
            'host' => $host,
            'port' => $port,
            'password' => $password
        ]);

    }

    /**
     * @return Client
     */
    public function getRedisConnection()
    {
        return $this->redisConnection;
    }
    
}
