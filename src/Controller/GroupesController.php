<?php

namespace App\Controller;

use App\Entity\Groupes;
use App\Repository\GroupesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GroupesController extends AbstractController
{
    #[Route('/groupes', name: 'app_groupes')]
    public function index(GroupesRepository $repository): Response
    {
        $group = $repository->findAll();
        return $this->render('groupes/index.html.twig', [
            'groupes' => $group,
        ]);
    }

    #[Route('/groupes/{id}', name: 'groupes_id')]
    public function show(Groupes $group): Response
    {
        return $this->render('groupes/groupeIdUser.html.twig', [
            'groupes' => $group
        ]);
    }
}
