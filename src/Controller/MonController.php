<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Depot;
use App\Entity\Compte;
use App\Form\UserType;
use App\Form\DepotType;
use App\Form\CompteType;
use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Repository\CompteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

 
    /**
     * @Route("/api")
     */
class MonController extends AbstractController
{

    private $passwordEncoder;

public function __construct(UserPasswordEncoderInterface $passwordEncoder)
{
  $this->passwordEncoder = $passwordEncoder;
}
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
     * @Route("/compte", name="compte_new", methods={"GET","POST"})
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
     * @Route("/user", name="user_new", methods={"GET","POST"})
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

    /**
     * @Route("/login_check", name="login", methods={"POST"})
     * @param JWTEncoderInterface $JWTEncoder
     * @throws \Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException
     */
    public function login(Request $request, JWTEncoderInterface  $JWTEncoder)
    { 
   
       $values = json_decode($request->getContent());
        $username   = $values->username; 
        $password   = $values->password; 
            $repo = $this->getDoctrine()->getRepository(User::class);
            $user = $repo-> findOneBy(['username' => $username]);
            if(!$user){
                return $this->json([
                        'message' => 'Username incorrect'
                    ]);
            }

            $isValid = $this->passwordEncoder
            ->isPasswordValid($user, $password);
            if(!$isValid){ 
                return $this->json([
                    'message' => 'Mot de passe incorect'
                ]);
            }
            if($user->getStatus()=="bloquer"){
                return $this->json([
                    'message' => 'ACCÈS REFUSÉ vous ne pouvez pas connecter !'
                ]);
            }
            $token = $JWTEncoder->encode([
                'username' => $user->getUsername(),
                'exp' => time() + 900000 // 1 day expiration
            ]);

            return $this->json([
                'token' => $token
            ]);
    }        
    /**
     * @Route("/depot", name="depot_new", methods={"GET","POST"})
     */
    public function depot(Request $request,  EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator,CompteRepository $repo): Response
    {
        $depot = new Depot();      
        $val = $request->request->all();

        $form = $this->createForm(DepotType::class, $depot);
        $form->submit($val);
        $depot-> setDateDepot(new \DateTime());

        $repo=$this->getDoctrine()->getRepository(Compte::class);
        $compte=$repo->findOneBy(['numCompte'=>$val]);
        $depot->setCompte($compte);

        $compte->setSolde($compte->getSolde()+$depot->getMontant());
        
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($depot);
        $entityManager->persist($compte);
        $entityManager->flush();

        return new Response('depot effectué  avec succès', Response::HTTP_CREATED);
            
    }
}
