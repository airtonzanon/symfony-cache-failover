<?php
/**
 * CustomersCacheRepository
 *
 * @since
 * @see
 * @author zanon
 *
 */

namespace AppBundle\Repository;

use AppBundle\Service\CacheService;
use Predis\PredisException;

class CustomersCacheRepository
{

    protected $redisConnection;

    function __construct(CacheService $cacheService)
    {
        $this->redisConnection = $cacheService->getRedisConnection();

    }

    /**
     * @param string $key
     * @return string Json with cache
     * @throws \Exception
     */
    public function get($key)
    {

        try {
            $result = $this->redisConnection->get($key);

            return $result;

        } catch (PredisException $ex) {
            return false;
        }

    }

    /**
     * @param string $key key to use after to get data
     * @param string $value Json data
     * @param int $expiresOn Seconds to expire cache data
     * @return bool
     */
    public function set($key, $value, $expiresOn = 0)
    {

        try {
            $this->redisConnection->set(
                $key,
                $value
            );

            if (!empty($expiresOn)) {
                $this->redisConnection->expire($key, $expiresOn);
            }

            return true;

        } catch (PredisException $ex) {
            return false;
        }


    }

    /**
     * @param $key
     * @return bool
     */
    public function del($key)
    {

        try {
            $this->redisConnection->del(array($key));

            return true;

        } catch (PredisException $ex) {
            return false;
        }

    }

}