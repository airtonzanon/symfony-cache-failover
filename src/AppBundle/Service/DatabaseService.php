<?php

namespace AppBundle\Service;

use MongoClient;
use \MongoDB;

class DatabaseService
{
    protected $database;

    public function __construct($host, $port, $database)
    {
        $mongoClient = new MongoClient("mongodb://$host:$port/");

        $this->setDatabase(
            $mongoClient->selectDB($database)
        );
    }

    public function setDatabase(MongoDB $database)
    {
        $this->database = $database;
    }

    public function getDatabase()
    {
        return $this->database;
    }
}
