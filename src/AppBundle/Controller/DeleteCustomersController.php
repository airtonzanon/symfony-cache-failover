<?php

/**
 * DeleteCustomersController
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

class DeleteCustomersController extends Controller
{

    /**
     * @Route("/customers/")
     * @Method("DELETE")
     */
    public function deleteAction()
    {
        try {
            $customerRepository = $this->get('repository.customers');
            $customerRepository->deleteAll();

            $cacheService = $this->get('repository.cache.costumers');
            $cacheService->del('cache');

            return new JsonResponse(['status' => 'Customers successfully deleted']);

        } catch (\Exception $ex) {
            $logger = $this->get('logger');
            $logger->error($ex->getMessage());

            return new JsonResponse(['status' => 'Something goes wrong, try again'], 500);
        }
    }

}
