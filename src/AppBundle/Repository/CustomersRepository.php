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
     * @param array $customer
     * @throws \Exception
     */
    public function insertData($customer)
    {
        try {
            $this->databaseService->customers->insert($customer);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public function deleteAll()
    {
        try {
            $this->databaseService->customers->drop();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

}