<?php

/**
 * PostCustomersController
 *
 * @since
 * @see
 * @author zanon
 *
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class PostCustomersController extends Controller
{
    /**
     * @Route("/customers/")
     * @Method("POST")
     */
    public function postAction(Request $request)
    {
        try {
            $customersRepository = $this->get('repository.customers');
            $customers = json_decode($request->getContent());

            if (empty($customers)) {
                return new JsonResponse(['status' => 'No donuts for you'], 400);
            }

            $cacheService = $this->get('repository.cache.costumers');
            $cacheService->del('cache');

            foreach ($customers as $customer) {
                $customersRepository->insertData($customer);
            }

            return new JsonResponse(['status' => 'Customers successfully created']);

        } catch (\Exception $ex) {
            $logger = $this->get('logger');
            $logger->error($ex->getMessage());

            return new JsonResponse(['status' => 'Something goes wrong, try again'], 500);
        }
    }

}
