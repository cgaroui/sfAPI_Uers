<?php

namespace App\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;


class ApiHttpClient extends AbstractController
{
    private $httpClient;

    // __construct définit le constructeur qui prend un service HttpClientInterface en paramètre et l'injecte dans le champ $httpClient.
    public function __construct(HttpClientInterface $jph)
    {
        $this->httpClient = $jph;
    }

    public function getUsers(){
        $response = $this->httpClient->request('GET',"?results=15", [
            'verify_peer' => false,
        ]);

        return $response->toArray();
        
    }
}