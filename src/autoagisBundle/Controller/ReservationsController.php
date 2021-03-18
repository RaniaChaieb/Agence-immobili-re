<?php

namespace autoagisBundle\Controller;

use autoagisBundle\Entity\Compte;
use autoagisBundle\Entity\Bien;

use autoagisBundle\Entity\Reservations;
use App\Repository\ReservationsRepository;

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
 * Reservations controller.
 *
 * @Route("Reservations")
 */
class ReservationsController extends Controller
{
/**
 * @Route("/add", methods={"POST"})
 */
public function AddReservationsAction(Request $request)
    { 
    $em = $this->getDoctrine()->getManager();
        $data = $request->getContent();
        $jsonData = json_decode($data,true);
        $idbien = $jsonData['id_bien'];
        $bien = $this->getDoctrine()->getRepository(Bien::class)->find($idbien);
        $idCompte=$jsonData['id_Compte'];

        $Compte = $this->getDoctrine()->getRepository(Compte::class)->find($idCompte);

        if(!$bien || !$Compte){
            return $this->json([
                'message' => 'bien ou Compte n\'exist pas ',
                'status' => 404
            ],404); }
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $Reservations = $serializer->deserialize($data,Reservations::class,'json');
        $Reservations->setBien($bien); 

         $Reservations->setCompte($Compte); 
        $em->persist($Reservations);
        $em->flush();
        return $this->json([
            'status' => 201,
            'message' => "Reservations added successfully",
           ],201);   
         }
/**
 * @Route("/{id}/edit")
 */
public function update($id,Request $request)
{
    $entityManager = $this->getDoctrine()->getManager();
    $Reservations = $entityManager->getRepository(Reservations::class)->find($id);
   if (!$Reservations) {
        throw $this->createNotFoundException(
            'No Reservations found for id '.$id);}
    $data = $request->getContent();
    $jsonData = json_decode($data,true);
    $idbien = $jsonData['id_bien'];
    $bien = $this->getDoctrine()->getRepository(Bien::class)->find($idbien);
    $idCompte=$jsonData['id_Compte'];
    $Compte= $this->getDoctrine()->getRepository(Compte::class)->find($idCompte);
    $Reservations->setBien($bien); 
    $Reservations->setCompte($Compte); 
    $Reservations->setDateRes($jsonData['date_res']); 
    $Reservations->setDateVisite($jsonData['date_visite']); 

    $entityManager->flush(); 
    return $this->json([
        'status' => 201,
        'message' => "Reservations updated succeffully" ,       
          ],201);   

}
     /**
     * @Route("/", name="Reservations_create")
     * @Method({"GET"})
     */
    public function listReservationAction()
    {
        $reservations = $this->getDoctrine()->getRepository('autoagisBundle:Reservations')->findAll();

        $data = $this->get('jms_serializer')->serialize($reservations, 'json', SerializationContext::create()->setGroups(array('list')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    /**
     * @Route("/{id}", name="Reservations_show")
     */
    public function showReservationsAction(Reservations $Reservations)
    {
        $data = $this->get('jms_serializer')->serialize($Reservations, 'json', SerializationContext::create()->setGroups(array('detail')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    } 
     /**
     * @Route("/{id}/delete" , name="Reservations_delete")
     * @Method({"DELETE"})
     
     */
    public function deletAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Reservations = $em->getRepository(Reservations::class)->findOneById($id);
        if (!$Reservations){
            $data = [
             'status' => 404,
             'errors' => "Reservations not found",
            ];
            return $this->json($data, 404);
           }
        $em->remove($Reservations);
        $em->flush();
        $data = [
            'status' => 200,
            'errors' => "Reservations deleted successfully",
           ];
           return $this->json($data);
}

   
 

}
