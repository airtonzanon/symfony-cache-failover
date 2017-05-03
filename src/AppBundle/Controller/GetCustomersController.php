<?php

/**
 * GetCustomersController
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

class GetCustomersController extends Controller
{
    /**
     * @Route("/customers/")
     * @Method("GET")
     */
    public function getAction()
    {
        try {
            $cacheService = $this->get('repository.cache.costumers');
            $customers = $cacheService->get('cache') ? json_decode($cacheService->get('cache')) : null;

            if (empty($customers)) {
                $customersRepository = $this->get('repository.customers');
                $customers = $customersRepository->getAll();

                $customers = iterator_to_array($customers);
                $cacheService->set('cache', json_encode($customers));
            }

            return new JsonResponse($customers);

        } catch (\Exception $ex) {
            $logger = $this->get('logger');
            $logger->error($ex->getMessage());

            return new JsonResponse(['status' => 'Something goes wrong, try again'], 500);
        }
    }

}
