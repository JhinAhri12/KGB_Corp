<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\Mission;
use App\Repository\MissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class MissionController extends AbstractController
{
    /**
     * @Route("/mission", name="mission")
     */
     public function findAllMission(MissionRepository $missionRepository)
     {
        $mission = $missionRepository->getInformationMissionsDQL();

        if(!$mission){
          throw $this->createNotFoundException("Pas de mission !");
        }
        //dd($mission);
        return $this->render('mission/index.html.twig',array('mission' => $mission));
     }

     /**
      * @Route("/mission_show", name="mission_show")
      */
    public function Show(Request $request,MissionRepository $missionRepository): Response
    {
      $id = $request->query->get('id');
      $mission = $missionRepository->getInformationMissionsParamDQL($id);
      if(!$mission)
      {
        throw $this->createNotFoundException("Il y a un problème avec cette mission !");
      }
      return $this->render('mission/show.html.twig',array('mission' => $mission));
    }
}
