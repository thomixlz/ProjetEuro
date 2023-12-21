<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TeamsRepository;

class DefaultController extends AbstractController {

    
/**
* @Route("/", name="app_index")
*/
public function index(TeamsRepository $teamsRepository): Response
{

    $teams = $teamsRepository->findAll();
    $teamsByRank = $teamsRepository->findBy([], ['rankFifa' => 'ASC']);

    $teamsPOT1 = $teamsRepository->findBy(['Chapeau' => 'POT1']);
    $teamsPOT2 = $teamsRepository->findBy(['Chapeau' => 'POT2']);
    $teamsPOT3 = $teamsRepository->findBy(['Chapeau' => 'POT3']);
    $teamsPOT4 = $teamsRepository->findBy(['Chapeau' => 'POT4']);

    $teamsBarrer = $teamsRepository->findBy(['Chapeau' => null]);





    return $this->render('index.html.twig', [
        'teams' => $teams,
        'teamsByRank' => $teamsByRank,
        'teamsPOT1' => $teamsPOT1,
        'teamsPOT2' => $teamsPOT2,
        'teamsPOT3' => $teamsPOT3,
        'teamsPOT4' => $teamsPOT4,
        'teamsBarrer' => $teamsBarrer,

    ]);
}
   












    
}
