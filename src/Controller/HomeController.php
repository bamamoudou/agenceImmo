<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(PropertyRepository $repository)
    {
        $properties = $repository->findLatest();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'current_menu' => 'properties',
            'properties' => $properties
        ]);
    }
}
