<?php

namespace App\Controller;

use App\Repository\GroupesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GroupesController extends AbstractController
{
    #[Route('/groupes', name: 'app_groupes')]
    public function index(GroupesRepository $repository): Response
    {
        $group = $repository->findAll();
        return $this->render('groupes/index.html.twig', [
            'group' => $group,
        ]);
    }
}
