<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
}
