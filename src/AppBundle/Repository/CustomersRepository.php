<?php
/**
 * CustomersRepository
 *
 * @since
 * @see
 * @author zanon
 *
 */

namespace AppBundle\Repository;

use AppBundle\Service\DatabaseService;

class CustomersRepository
{

    protected $databaseService;

    public function __construct(DatabaseService $database)
    {
        $this->databaseService = $database->getDatabase();

    }

    public function getAll()
    {
        try {
            $customers = $this->databaseService->customers->find();

            return $customers;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     * @param $customer
     * @return bool
     * @throws \Exception
     */
    public function insertData($customer)
    {
        try {
            $this->databaseService->customers->insert($customer);

            return true;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public function deleteAll()
    {
        try {
            $this->databaseService->customers->drop();
            return true;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

}