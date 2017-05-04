<?php
/**
 *
 * CustomersCacheRepositoryTest
 *
 * @category  PHP
 * @author    zanon <airtonzanon@gmail.com>
 * @copyright 5/4/17
 */

namespace AppBundle\Tests\Repository;


use AppBundle\Repository\CustomersCacheRepository;
use AppBundle\Service\CacheService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class CustomersCacheRepositoryTest extends TestCase
{

    protected $redisConnection;

    public function setUp()
    {

        $this->redisConnection = new CustomersCacheRepository(
            new CacheService('redis', 6379, null, 'cache')
        );

    }

    public function testDel()
    {

        $deleteCache = $this->redisConnection->del('cache');

        $this->assertTrue($deleteCache);

    }

    public function testSet()
    {

        $customers = ['name' => 'Airton'];
        $customers = json_encode($customers);

        $insertCache = $this->redisConnection->set('cache', $customers);

        $this->assertTrue($insertCache);
    }

    public function testGet()
    {
        $cacheData = $this->redisConnection->get('cache');
        $cacheData = json_decode($cacheData, true);

        $this->assertCount(1, $cacheData);
    }

}