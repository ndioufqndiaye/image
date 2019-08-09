<?php

namespace App\Controller;

use App\Entity\Depot;
use App\Entity\Image;
use App\Entity\Compte;
use App\Form\DepotType;
use App\Form\ImageType;
use App\Repository\UserRepository;
use App\Repository\CompteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
   /**
     * @Route("/ajout", name="image_ajout")
     */
class ImageController extends AbstractController
{
    /**
     * @Route("/image", name="image")
     */
    public function image(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator): Response
    {
        $image = new Image();

        $form = $this->createForm(ImageType::class, $image);
        $data = $request->request->all();
        $form->submit($data);

        $file = $request->files->all()['imageName'];
        $image->setImageFile($file);

        #$image->setUpdatedAt(new \DateTime());

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($image);
        $entityManager->flush();

        return new Response('image  ajouté  avec succès', Response::HTTP_CREATED);
            
    }

     /**
     * @Route("/bloquer", name="bloquer", methods={"POST"})
     */
    public function userBloquer(Request $request, UserRepository $userRepo,EntityManagerInterface $entityManager): Response
    {
        $values = json_decode($request->getContent());

        $bloq=$userRepo->findOneByUsername($values->username);
       if($bloq->getStatus()=="bloquer" ){

        $bloq->setStatus("activer");
        $bloq->setRoles(["ROLE_ADMIN"]);
          
          }
       elseif($bloq->getStatus()=="activer")
       {
           $bloq->setStatus("bloquer");
           $bloq->setRoles(["ROLE_ADMINLOCK"]);
       }

        $entityManager->flush();
        $data=
        [
            'status' => 200,
            'message' => 'message bloqué/débloqué'
        ];
      
        return new JsonResponse($data);

        
    }
}
