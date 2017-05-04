<?php

/**
 *
 * GetCustomersControllerTest
 *
 * @category  PHP
 * @author    zanon <airtonzanon@gmail.com>
 * @copyright 5/4/17
 */

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetCustomersControllerTest extends WebTestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = static::createClient();
        $this->client->followRedirects();
    }

    public function testGetCustomers()
    {

        $this->client->request('GET', '/customers/', [], [], ['CONTENT_TYPE' => 'application/json']);

        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }
}
