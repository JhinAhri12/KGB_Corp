<?php

namespace App\Controller;

use App\Entity\Administrateur;
use App\Entity\Specialite;
use App\Repository\MissionRepository;
use App\Repository\SpecialiteRepository;
use App\Repository\ContactRepository;
use App\Repository\AgentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\JsonResponse;

class AdminController extends AbstractController
{
  // ***** ESPACE ADMIN
  /**
   * @Route("/admin", name="admin")
   */
   public function index()
   {
      return $this->render('admin/index.html.twig');
   }

   /**
    * @Route("/adminSpécialité")
    */
    public function indexAdminSpé()
    {
      return $this->render('admin/showAdminSpé.html.twig');
    }

    // ***** ESPACE SPECIALITE
    /**
     * @Route("/show_spe")
     */
    public function showAdminSpé(SpecialiteRepository $specialiteRepository)
    {
      $specialite = $specialiteRepository->showSpecialiteDQL();
      //dd($mission);

      return new JsonResponse($specialite);
    }

    /**
     * @Route("/create_spe")
     */
     public function createAdminSpé(Request $request,SpecialiteRepository $specialiteRepository)
     {

       $description = $request->request->get('description');

       $specialite = $specialiteRepository->createSpecialiteDQL($description);

       if(!$specialite)
       {
         $myresponse = array('success' => false  );
       }
       else {
         $myresponse = array('success' => true  );
       }
       return new JsonResponse($myresponse);

     }

     /**
      * @Route("/edit_spe/{id}")
      */
      public function editAdminSpé(int $id,Request $request)
      {
        $entityManager = $this->getDoctrine()->getManager();
        $specialite = $entityManager->getRepository(Specialite::class)->find($id);

        if (!$specialite) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
            $myresponse = array('success' => false  );
        }
        else {
          $description = $request->request->get('description');
          $specialite->setDescription($description);
          $entityManager->flush();
          $myresponse = array('success' => true  );
        }
        return new JsonResponse($myresponse);
      }


      /**
       * @Route("/delete_spe/{id}")
       */
       public function deleteAdminSpé(int $id)
       {
         $entityManager = $this->getDoctrine()->getManager();
         $specialite = $entityManager->getRepository(Specialite::class)->find($id);

         if (!$specialite) {
             throw $this->createNotFoundException(
                 'No product found for id '.$id
             );
             $myresponse = array('success' => false  );
         }
         else {
           $entityManager->remove($specialite);
           $entityManager->flush();
           $myresponse = array('success' => true  );
         }
         return new JsonResponse($myresponse);
       }

     // ***** ESPACE CONTACT
     /**
      * @Route("/adminContact")
      */
      public function indexAdminCon()
      {
        return $this->render('admin/showAdminCon.html.twig');
      }

      /**
       * @Route("/show_con")
       */
      public function showAdminCon(ContactRepository $contactRepository)
      {
        $contact = $contactRepository->showContactDQL();
        return new JsonResponse($contact);
      }

      /**
       * @Route("/create_con")
       */
       public function createAdminCon(Request $request,ContactRepository $contactRepository)
       {

         $nom = $request->request->get('nom');
         $prenom = $request->request->get('prenom');
         $date_de_naissance = $request->request->get('date_de_naissance');
         $nom_de_code = $request->request->get('nom_de_code');
         $nationalite = $request->request->get('nationalite');

         $contact = $contactRepository->createContactDQL($nom, $prenom, $date_de_naissance, $nom_de_code, $nationalite);

         if(!$contact)
         {
           $myresponse = array('success' => false  );
         }
         else {
           $myresponse = array('success' => true  );
         }
         return new JsonResponse($myresponse);

       }

       // ***** ESPACE AGENT
        /**
         * @Route("/adminAgent")
         */
         public function indexAdminAge()
         {
           return $this->render('admin/showAdminAge.html.twig');
         }

         /**
          * @Route("/show_age")
          */
       public function showAdminAge(AgentRepository $agentRepository)
       {
         $agent = $agentRepository->showAgentDQL();

         return new JsonResponse($agent);
       }

       /**
        * @Route("/create_age")
        */
        public function createAdminAge(Request $request,AgentRepository $agentRepository)
        {

          $nom = $request->request->get('nom');
          $prenom = $request->request->get('prenom');
          $date_de_naissance = $request->request->get('date_de_naissance');
          $code_identification = $request->request->get('code_identification');
          $nationalite = $request->request->get('nationalite');
          $specialite = $request->request->get('specialite');

          $agent = $agentRepository->createAgentDQL($nom, $prenom, $date_de_naissance, $code_identification, $nationalite,$specialite);

          if(!$agent)
          {
            $myresponse = array('success' => false  );
          }
          else {
            $myresponse = array('success' => true  );
          }
          return new JsonResponse($myresponse);

        }


}
