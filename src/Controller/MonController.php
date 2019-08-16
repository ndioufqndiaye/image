<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Depot;
use App\Entity\Compte;
use App\Entity\Tarifs;
use App\Form\UserType;
use App\Form\DepotType;
use App\Form\CompteType;
use App\Entity\Expediteur;
use App\Entity\Partenaire;
use App\Entity\Transaction;
use App\Entity\Beneficiaire;
use App\Form\ExpediteurType;
use App\Form\PartenaireType;
use App\Form\TransactionType;
use App\Form\BeneficiaireType;
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
                               
        $utilisateur->setRoles(["ROLE_CAISSIER"]);
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
        
        if($compte){
        $depot->setCompte($compte);

        $compte->setSolde($compte->getSolde()+$depot->getMontant());
        
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($depot);
        $entityManager->persist($compte);
        $entityManager->flush();

        return new Response('depot effectué  avec succès', Response::HTTP_CREATED);

        }else{

            return new Response('numero de compte incorrect', Response::HTTP_CREATED);
   
        }     
    }

    /**
     * @Route("/transaction", name="transfert" ,methods={"POST"})
     */
    public function index(Request $request, EntityManagerInterface $entityManager )
    {
        $expediteur = new Expediteur();
        $form=$this->createForm(ExpediteurType::class , $expediteur);
        $form->handleRequest($request);
        $data=$request->request->all();
         $form->submit($data);
         
         $beneficiaire = new Beneficiaire();
        $form=$this->createForm(BeneficiaireType::class , $beneficiaire);
        $form->handleRequest($request);
        $data=$request->request->all();
         $form->submit($data);
         
        $transfert = new Transaction();
        $form=$this->createForm(TransactionType::class , $transfert);
        $form->handleRequest($request);
        $data=$request->request->all();
         $form->submit($data);
        $transfert->setDatetransaction(new \Datetime());

        $jour = date('d');
        $mois = date('m');
        $annee = date('Y');
        $heure = date('H');
       
        
        
        $code=$jour. $mois. $annee. $heure;

        $valeur=$form->get('montant')->getData();

    $tarif= $this->getDoctrine()->getRepository(Tarifs::class)->findAll();

    foreach($tarif as $values){
        $values->getBorneInferieur();
        $values->getBorneSuperieur();
        $values->getValeur();
        if($valeur>=$values->getBorneInferieur() && $valeur<=$values->getBorneSuperieur() ){
           $commision=$values->getValeur();
           $transfert->setFrais($values);
            $envoi=($commision*10)/100;
        }
        
     }

 
        $transfert->setExpediteur($expediteur);
        $transfert->setBeneficiaire($beneficiaire);
        $transfert->setCode($code);
        $user=$this->getUser();
        $transfert->setUser($user);
        $comp= $this->getDoctrine()->getRepository(Compte::class)->findOneBy(['Partenaire' => $user->getPartenaire()]);
     

        if($comp->getSolde() > $transfert->getMontant() ){
       $montant= $comp->getSolde()-$transfert->getMontant()+$envoi;
    

       $comp->setSolde($montant);
       $entityManager->persist($transfert);
       $entityManager->persist($comp);
       $entityManager->persist($expediteur);
       $entityManager->persist($beneficiaire);
       $entityManager->flush();

       return new Response('Le transfert a été effectué avec succés. Voici le code : '.$transfert->getCode());
        }else{
            return new Response('Le solde de votre compte ne vous permet d effectuer une transaction');
        }
    }    
}
