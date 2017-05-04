<?php
/**
 *
 * CustomersRepositoryTest
 *
 * @category  PHP
 * @author    zanon <airtonzanon@gmail.com>
 * @copyright 5/4/17
 */

namespace AppBundle\Tests\Repository;

use AppBundle\Repository\CustomersRepository;
use AppBundle\Service\DatabaseService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class CustomersRepositoryTest extends TestCase
{

    protected $customersRepository;

    public function setUp()
    {

        $this->customersRepository = new CustomersRepository(
            new DatabaseService('mongodb', '27017', 'easytaxi-symfony-cache-test')
        );

    }

    public function testDelAll()
    {
        $delete = $this->customersRepository->deleteAll();

        $this->assertTrue($delete);

    }

    public function testInsertData()
    {

        $customer = ['name' => 'Airton'];

        $insert = $this->customersRepository->insertData($customer);

        $this->assertTrue($insert);

    }

    public function testGetAll()
    {
        $customerData = $this->customersRepository->getAll();
        $customerData = iterator_to_array($customerData);

        $this->assertCount(1, $customerData);

    }

}