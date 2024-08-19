<?php

namespace App\Controller;

use App\HttpClient\ApiHttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    private $apiHttpClient;

    public function __construct(ApiHttpClient $apiHttpClient)
    {
        $this->apiHttpClient = $apiHttpClient;
    }


    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        // Utilisation de la méthode getUsers() pour obtenir les utilisateurs
        $users = $this->apiHttpClient->getUsers();

        // Passer les utilisateurs au template Twig
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
            'users' => $users,
        ]);
    }
}
