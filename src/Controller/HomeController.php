<?php

namespace App\Controller;

use App\Repository\CandidatRepository;
use App\Repository\FormateurRepository;
use App\Repository\OrganismeRepository;
use App\Repository\PromotionRepository;
use App\Repository\SalleRepository;
use App\Repository\SessionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        OrganismeRepository $organismeRepository,
        CandidatRepository $candidatRepository,
        PromotionRepository $promotionRepository,
        FormateurRepository $formateurRepository,
        SessionRepository $sessionRepository,
        SalleRepository $salleRepository
    ): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'organismes' => $organismeRepository->findAll(),
            'candidats' => $candidatRepository->findAll(),
            'promotions' => $promotionRepository->findAll(),
            'formateurs' => $formateurRepository->findAll(),
            'sessions' => $sessionRepository->findAll(),
            'salles' => $sessionRepository->findAll(),
            'nb_organismes' => count($organismeRepository->findAll()),
            'nb_candidats' => count($candidatRepository->findAll()),
            'nb_promotions' => count($promotionRepository->findAll()),
            'nb_formateurs' => count($formateurRepository->findAll()),
            'nb_sessions' => count($sessionRepository->findAll()),
            'nb_salles' => count($salleRepository->findAll()),
        ]);
    }

}
