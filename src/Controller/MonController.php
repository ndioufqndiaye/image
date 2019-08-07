<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Compte;
use App\Form\UserType;
use App\Form\CompteType;
use App\Entity\Partenaire;
use App\Form\PartenaireType;
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
     * @Route("/ajouter")
     */
class MonController extends AbstractController
{
    /**
     * @Route("/partenaire", name="partenaire_new", methods={"GET","POST"})
     */
    public function Partenaire(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator): Response
    {
        $partenaire = new Partenaire();
        $form = $this->createForm(PartenaireType::class, $partenaire);
        $data = $request->request->all();
        $form->submit($data);
        $partenaire->setStatus("activer");
        $entityManager->persist($partenaire);
        $entityManager->flush();

        
        $compte = new Compte();
        $form = $this->createForm(CompteType::class, $compte);
        $data = $request->request->all();
        $form->submit($data);
        $compte->setSolde(0);
        $num = rand(10000000, 99999999);
        $compte->setNumCompte($num);
        $compte->setPartenaire($partenaire);
        $compte-> setDateCreation(new \DateTime());
        $entityManager = $this->getDoctrine()->getManager();


        
        $utilisateur = new User();
        $form = $this->createForm(UserType::class, $utilisateur);
        $form->handleRequest($request);
        $data = $request->request->all();
        $form->submit($data);
        
        $file = $request->files->all()['imageName'];
        $utilisateur->setImageFile($file);
                               
        $utilisateur->setRoles(["ROLE_ADMIN"]);
        $utilisateur->setStatus("activer");

        $utilisateur->setPartenaire($partenaire);
        $utilisateur->setCompte($compte);

        $utilisateur->setPassword(
            $passwordEncoder->encodePassword(
                $utilisateur,
                $form->get('password')->getData()
            )
        );
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($compte);
        $entityManager->persist($utilisateur);
        $entityManager->flush();
        return new Response('partenaire  ajouté  avec succès', Response::HTTP_CREATED);
            
    }


    /**
     * @Route("/compte", name="partenaire_new", methods={"GET","POST"})
     */
    public function compte(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator): Response
    {
        $compte = new Compte();
        $form = $this->createForm(CompteType::class, $compte);
        $data = $request->request->all();
        $form->submit($data);
        #$compte->setSolde(0);
        $num = rand(10000000, 99999999);
        $compte->setNumCompte($num);
       # $compte->setPartenaire($partenaire);
        $compte-> setDateCreation(new \DateTime());

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($compte);
        $entityManager->flush();
        return new Response('compte créer  avec succès', Response::HTTP_CREATED);
            
    }

 /**
     * @Route("/user", name="partenaire_new", methods={"GET","POST"})
     */
    public function user(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator): Response
    {

        $utilisateur = new User();
        $form = $this->createForm(UserType::class, $utilisateur);
        $form->handleRequest($request);
        $data = $request->request->all();
        $form->submit($data);
        
        $file = $request->files->all()['imageName'];
        $utilisateur->setImageFile($file);
                               
        $utilisateur->setRoles(["ROLE_ADMIN"]);
        #$utilisateur->setStatus("activer");


        $utilisateur->setPassword(
            $passwordEncoder->encodePassword(
                $utilisateur,
                $form->get('password')->getData()
            )
        );
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($utilisateur);
        $entityManager->flush();
        return new Response('utilisateur ajouté  avec succès', Response::HTTP_CREATED);
    }

}
