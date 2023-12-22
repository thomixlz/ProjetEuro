<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\MatchGroup;
use App\Repository\TeamsRepository;
use App\Repository\MatchGroupRepository;
use App\Repository\MatchBarrerRepository;



use Doctrine\ORM\EntityManagerInterface;




class DefaultController extends AbstractController {

    
/**
* @Route("/", name="app_index")
*/
public function index(TeamsRepository $teamsRepository, MatchGroupRepository $matchGroupRepository, MatchBarrerRepository $matchBarrierRepository ): Response {

    $teams = $teamsRepository->findAll();
    $teamsByRank = $teamsRepository->findBy([], ['rankFifa' => 'ASC']);

    $teamsPOT1 = $teamsRepository->findBy(['Chapeau' => 'POT1']);
    $teamsPOT2 = $teamsRepository->findBy(['Chapeau' => 'POT2']);
    $teamsPOT3 = $teamsRepository->findBy(['Chapeau' => 'POT3']);
    $teamsPOT4 = $teamsRepository->findBy(['Chapeau' => 'POT4']);

    $teamsBarrer = $teamsRepository->findBy(['Chapeau' => null]);
    $teamsBarrierQualifer =  $teamsRepository->findBy([ 'Chapeau' => 'POT4','Path' => ['PATHA', 'PATHB', 'PATHC']]);

    $matchesGroup = $matchGroupRepository->findAll();
    $matchesBarrier = $matchBarrierRepository->findAll();

    $classementGroup = $teamsRepository->findAll();
    $classementGroupPOT1 = $teamsRepository->findBy(['Chapeau' => 'POT1']);
    $classementGroupPOT2 = $teamsRepository->findBy(['Chapeau' => 'POT2']);
    $classementGroupPOT3 = $teamsRepository->findBy(['Chapeau' => 'POT3']);
    $classementGroupPOT4 = $teamsRepository->findBy(['Chapeau' => 'POT4']);


    usort($classementGroup, function($a, $b) {
        // Sort by points (descending)
        if ($a->getPoints() !== $b->getPoints()) {
            return $b->getPoints() - $a->getPoints();
        }
        return strcmp($a->getName(), $b->getName());
    });

    usort($classementGroupPOT1, function($a, $b) {
        // Sort by points (descending)
        if ($a->getPoints() !== $b->getPoints()) {
            return $b->getPoints() - $a->getPoints();
        }
        return strcmp($a->getName(), $b->getName());
    });


    usort($classementGroupPOT2, function($a, $b) {
        // Sort by points (descending)
        if ($a->getPoints() !== $b->getPoints()) {
            return $b->getPoints() - $a->getPoints();
        }
        return strcmp($a->getName(), $b->getName());
    });


    usort($classementGroupPOT3, function($a, $b) {
        // Sort by points (descending)
        if ($a->getPoints() !== $b->getPoints()) {
            return $b->getPoints() - $a->getPoints();
        }
        return strcmp($a->getName(), $b->getName());
    });

    usort($classementGroupPOT4, function($a, $b) {
        // Sort by points (descending)
        if ($a->getPoints() !== $b->getPoints()) {
            return $b->getPoints() - $a->getPoints();
        }
        return strcmp($a->getName(), $b->getName());
    });






    // Group match by 'Chapeau'
    $matchesByGroup = [];
    foreach ($matchesGroup as $match) {
        $chapeau = $match->getTeam1()->getChapeau();
        $matchesByGroup[$chapeau][] = $match;
    }

    // Barrier match
    $matchesByBarrier = [];
    foreach ($matchesBarrier as $match) {
        $path= $match->getTeam1()->getPath();
        $matchesByBarrier[$path][] = $match;
    }





    return $this->render('index.html.twig', [
        'teams' => $teams,
        'teamsByRank' => $teamsByRank,

        

       
      
        'teamsPOT1' => $teamsPOT1,
        'teamsPOT2' => $teamsPOT2,
        'teamsPOT3' => $teamsPOT3,
        'teamsPOT4' => $teamsPOT4,
        'teamsBarrer' => $teamsBarrer,

        'matchesByGroup' => $matchesByGroup,
        'matchesByBarrier' => $matchesByBarrier,

        'barrierQualifier' => $teamsBarrierQualifer,

        'classementTeamGroupPOT1' => $classementGroupPOT1,
        'classementTeamGroupPOT2' => $classementGroupPOT2,
        'classementTeamGroupPOT3' => $classementGroupPOT3,
        'classementTeamGroupPOT4' => $classementGroupPOT4,
        'classementTeamGroup' => $classementGroup,

    ]);
}

/**
* @Route("/generate-group-matches", name="generate_group_matches")
*/
public function generateMatches(TeamsRepository $teamsRepository, EntityManagerInterface $entityManager): Response {
    
    // Delete all matches
    $entityManager->createQuery('DELETE FROM App\Entity\MatchGroup')->execute();

    // Tab all matches
    $generatedMatches = []; 

    // Create matches for all groups
    foreach (['POT1', 'POT2', 'POT3', 'POT4'] as $pot) {
            $teams = $teamsRepository->findBy(['Chapeau' => $pot]);
            for ($i = 0; $i < count($teams); $i++) {
                for ($j = $i + 1; $j < count($teams); $j++) {
                    $match = new MatchGroup();
                    $match->setTeam1($teams[$i]);
                    $match->setTeam2($teams[$j]);
                    $entityManager->persist($match);
                    // Push to tab
                    $generatedMatches[] = $match; 
            }
        }
    }

    // Assign score by match
    foreach ($generatedMatches as $match) {
        $score = $this->generateScore($match->getTeam1(), $match->getTeam2());
        $match->setScore($score);
    }


    foreach ($generatedMatches as $match) {
        // Your existing score setting logic
    
        // Add logic to update team stats
        $team1 = $match->getTeam1();
        $team2 = $match->getTeam2();
        list($score1, $score2) = explode('-', $match->getScore());
    
        // Update goals
        $team1->setGoalsScored($team1->getGoalsScored() + $score1);
        $team2->setGoalsScored($team2->getGoalsScored() + $score2);
    
        $team1->setGoalsConceded($team1->getGoalsConceded() + $score2);
        $team2->setGoalsConceded($team2->getGoalsConceded() + $score1);
    
        // Update wins, draws, losses, and points
        if ($score1 > $score2) { // Team 1 wins
            $team1->setWins($team1->getWins() + 1);
            $team1->setPoints($team1->getPoints() + 3);
            $team2->setLosses($team2->getLosses() + 1);
        } elseif ($score1 < $score2) { // Team 2 wins
            $team2->setWins($team2->getWins() + 1);
            $team2->setPoints($team2->getPoints() + 3);
            $team1->setLosses($team1->getLosses() + 1);
        } else { // Draw
            $team1->setDraws($team1->getDraws() + 1);
            $team2->setDraws($team2->getDraws() + 1);
            $team1->setPoints($team1->getPoints() + 1);
            $team2->setPoints($team2->getPoints() + 1);
        }
    
        $entityManager->persist($team1);
        $entityManager->persist($team2);
    }

        $entityManager->flush();

        return $this->redirectToRoute('app_index');
    }




/**
* @Route("/reset-group-matches", name="reset_group_matches")
*/

public function resetMatches(TeamsRepository $teamsRepository,EntityManagerInterface $entityManager): Response {
        // Delete all matches
        $entityManager->createQuery('DELETE FROM App\Entity\MatchGroup')->execute();

        $teams = $teamsRepository->findAll();
foreach ($teams as $team) {
    $team->setWins(0);
    $team->setLosses(0);
    $team->setDraws(0);
    $team->setGoalsScored(0);
    $team->setGoalsConceded(0);
    $team->setPoints(0);
    $entityManager->persist($team);
}
$entityManager->flush();

        return $this->redirectToRoute('app_index');
    }
    
    private function generateScore($teamA, $teamB) {
        // Prob and logic
        $random = mt_rand(1, 100);
        if ($random <= 68) { 
            $commonScores = ['1-1', '2-0', '1-0', '2-1', '0-0', '0-1', '1-2'];
            $score = $commonScores[array_rand($commonScores)];
        } else if ($random <= 84) { 
            $score = $this->generateHigherButReasonableScore();
        } else { 
            $score = $this->generateUncommonScore();
        }
    
        // use ranking function for create a logic score
        return $this->adjustScoreForFifaRanking($score, $teamA, $teamB);
    }
    

    // Generate reasonable score and compare all scores
    private function generateHigherButReasonableScore() {
        $scoreA = mt_rand(0, 3);
        $scoreB = mt_rand(0, 3);
        if ($scoreA == $scoreB) {
            $scoreB = ($scoreB + 1) % 4;
        }
        return $scoreA . '-' . $scoreB;
    }
    
    private function generateUncommonScore() {
        $scoreA = mt_rand(0, 4);
        $scoreB = mt_rand(0, 4);
        return $scoreA . '-' . $scoreB;
    }
    
    private function adjustScoreForFifaRanking($score, $teamA, $teamB) {
        list($scoreA, $scoreB) = explode('-', $score);
    
        $rankA = $teamA->getRankFifa();
        $rankB = $teamB->getRankFifa();
    
        $rankDifference = abs($rankA - $rankB);
    
        if ($rankDifference != 0 && $rankA != $rankB) {
            if ($rankA < $rankB) {
                // Team A have best rank so ajust the score for him
                $scoreA += ($rankDifference >= 10 && $scoreA < 4) ? 1 : 0;
            } else {
                // the same for Team B
                $scoreB += ($rankDifference >= 10 && $scoreB < 4) ? 1 : 0;
            }
        }
    
        return min($scoreA, 8) . '-' . min($scoreB, 8); 
    }



/**
 * @Route("/random-select", name="random_select")
 */
public function randomSelect(TeamsRepository $teamsRepository, EntityManagerInterface $entityManager): Response {
    $teamsBarrer = $teamsRepository->findBy([
    
        'Path' => ['PATHA', 'PATHB', 'PATHC']
    ]);
    if (count($teamsBarrer) >= 3) {
        shuffle($teamsBarrer); // Randomize the array
        for ($i = 0; $i < 3; $i++) {
            $team = $teamsBarrer[$i];
            $team->setChapeau('POT4');
            $entityManager->persist($team);
        }
        $entityManager->flush(); // Commit changes to the database
    }

    return $this->redirectToRoute('app_index');
}


/**
 * @Route("/reset-selection", name="reset_selection")
 */
public function resetSelection(TeamsRepository $teamsRepository, EntityManagerInterface $entityManager): Response {
    $teamsInPOT4 = $teamsRepository->findBy([
        'Chapeau' => 'POT4',
        'Path' => ['PATHA', 'PATHB', 'PATHC']
    ]);
    
    foreach ($teamsInPOT4 as $team) {
        $team->setChapeau(null);
        $entityManager->persist($team);
    }
    $entityManager->flush(); // Commit changes to the database

    return $this->redirectToRoute('app_index');
}



















    
}
