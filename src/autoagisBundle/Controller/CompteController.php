<?php

namespace autoagisBundle\Controller;

use autoagisBundle\Entity\Utilisateur;

use autoagisBundle\Entity\Compte;
use App\Repository\CompteRepository;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;


/**
 * Compte controller.
 *
 * @Route("Compte")
 */
class CompteController extends Controller
{
/**
 * @Route("/add", methods={"POST"})
 */
public function AddCompteAction(Request $request)
    { 
    $em = $this->getDoctrine()->getManager();
        $data = $request->getContent();
        $jsonData = json_decode($data,true);
        $idutilisateur=$jsonData['id_utilisateur'];

        $utilisateur = $this->getDoctrine()->getRepository(Utilisateur::class)->find($idutilisateur);

        if( !$utilisateur){
            return $this->json([
                'message' => 'utilisateur n\'exist pas ',
                'status' => 404
            ],404); }
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $Compte = $serializer->deserialize($data,Compte::class,'json');

         $Compte->setUtilisateur($utilisateur); 
        $em->persist($Compte);
        $em->flush();
        return $this->json([
            'status' => 201,
            'message' => "Compte added successfully",
           ],201);   
         }
/**
 * @Route("/{id}/edit")
 */
public function update($id,Request $request)
{
    $entityManager = $this->getDoctrine()->getManager();
    $Compte = $entityManager->getRepository(Compte::class)->find($id);
   if (!$Compte) {
        throw $this->createNotFoundException(
            'No Compte found for id '.$id);}
    $data = $request->getContent();
    $jsonData = json_decode($data,true);
    
    $idutilisateur=$jsonData['id_utilisateur'];
    $utilisateur= $this->getDoctrine()->getRepository(Utilisateur::class)->find($idutilisateur);
    $Compte->setUtilisateur($utilisateur); 
    $Compte->setUsername($jsonData['username']); 
    $Compte->setPassword($jsonData['password']); 

    $entityManager->flush(); 
    return $this->json([
        'status' => 201,
        'message' => "Compte updated succeffully" ,       
          ],201);   

}
     /**
     * @Route("/", name="Compte_create")
     * @Method({"GET"})
     */
    public function listReservationAction()
    {
        $Compte = $this->getDoctrine()->getRepository('autoagisBundle:Compte')->findAll();

        $data = $this->get('jms_serializer')->serialize($Compte, 'json', SerializationContext::create()->setGroups(array('list')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    /**
     * @Route("/{id}", name="Compte_show")
     */
    public function showCompteAction(Compte $Compte)
    {
        $data = $this->get('jms_serializer')->serialize($Compte, 'json', SerializationContext::create()->setGroups(array('detail')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    } 
     /**
     * @Route("/{id}/delete" , name="Compte_delete")
     * @Method({"DELETE"})
     
     */
    public function deletAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Compte = $em->getRepository(Compte::class)->findOneById($id);
        if (!$Compte){
            $data = [
             'status' => 404,
             'errors' => "Compte not found",
            ];
            return $this->json($data, 404);
           }
        $em->remove($Compte);
        $em->flush();
        $data = [
            'status' => 200,
            'errors' => "Compte deleted successfully",
           ];
           return $this->json($data);
}

   
 

}
