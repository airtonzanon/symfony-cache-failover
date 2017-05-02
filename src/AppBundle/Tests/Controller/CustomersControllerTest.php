<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CustomersControllerTest extends WebTestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = static::createClient();
        $this->client->followRedirects();
    }

    public function testCreateCustomers()
    {
        $customers = [
            ['name' => 'Leandro', 'age' => 26],
            ['name' => 'Marcelo', 'age' => 30],
            ['name' => 'Alex', 'age' => 18],
        ];
        $customers = json_encode($customers);

        $this->client->request('POST', '/customers/', [], [], ['CONTENT_TYPE' => 'application/json'], $customers);

        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }
}
