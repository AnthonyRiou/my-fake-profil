<?php

namespace App\Controller;

use App\Repository\UtilisateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UtilisateursController extends AbstractController
{
    #[Route('/utilisateurs', name: 'app_utilisateurs')]
    public function index(UtilisateursRepository $repository): Response
    {
        $users = $repository->findAll();
        return $this->render('utilisateurs/index.html.twig', [
            'users' => $users
        ]);
    }
}
