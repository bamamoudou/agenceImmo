<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;

    }

    /**
     * @Route("/biens", name="property.index")
     */
    public function index()
    {
     /*

     $property = new Property();
        $property->setTitle('Résidence la Fontaine')
                 ->setPrix(200000)
                 ->setRooms(4)
                 ->setBedrooms(5)
                 ->setDescription('Une résendence super sympa')
                 ->setSurface(100)
                 ->setFloor(5)
                 ->setHeat(1)
                 ->setCity('Paris')
                 ->setAddress('20 rue de paris')
                 ->setPostalCode('72011');

        //permet d'apporter les changement dans la base de données

        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();

     */


        return $this->render('property/index.html.twig', [
            'controller_name' => 'PropertyController',
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})

     * @return Response
     */
    public function show(Property $property, string $slug): Response
    {
        if ($property->getSlug() !==$slug)
        {
            return $this->redirectToRoute('property.show',[
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig', [
            'property' => $property,
            'current_menu' => 'properties'
        ]);
    }
}
