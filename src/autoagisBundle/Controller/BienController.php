<?php

namespace autoagisBundle\Controller;

use autoagisBundle\Entity\Image;

use autoagisBundle\Entity\Bien;
use App\Repository\BienRepository;

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
 * Bien controller.
 *
 * @Route("Bien")
 */
class BienController extends Controller
{
/**
 * @Route("/add", methods={"POST"})
 */
public function AddBienAction(Request $request)
    { 
    $em = $this->getDoctrine()->getManager();
        $data = $request->getContent();
        $jsonData = json_decode($data,true);
        $idimage=$jsonData['id_image'];

        $image = $this->getDoctrine()->getRepository(Image::class)->find($idimage);

        if( !$image){
            return $this->json([
                'message' => 'utilisateur n\'exist pas ',
                'status' => 404
            ],404); }
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $Bien = $serializer->deserialize($data,Bien::class,'json');

         $Bien->setImage($image); 
        $em->persist($Bien);
        $em->flush();
        return $this->json([
            'status' => 201,
            'message' => "Bien added successfully",
           ],201);   
         }
/**
 * @Route("/{id}/edit")
 */
public function update($id,Request $request)
{
    $entityManager = $this->getDoctrine()->getManager();
    $Bien = $entityManager->getRepository(Bien::class)->find($id);
   if (!$Bien) {
        throw $this->createNotFoundException(
            'No Bien found for id '.$id);}
    $data = $request->getContent();
    $jsonData = json_decode($data,true);
    
    $idimage=$jsonData['id_image'];
    $image= $this->getDoctrine()->getRepository(Image::class)->find($idimage);
    $Bien->setImage($image); 
    $Bien->setTypeBien($jsonData['type_bien']); 
    $Bien->setEtatBien($jsonData['etat_bien']); 
    $Bien->setEtatBien($jsonData['transaction']); 
    $Bien->setNomBien($jsonData['nom_bien']); 
    $Bien->setPrixBien($jsonData['prix_bien']); 
    $Bien->setSuperficie($jsonData['superficie']); 
    $Bien->setVille($jsonData['ville']); 
    $Bien->setPays($jsonData['pays']); 
    $Bien->setRue($jsonData['rue']); 
    $Bien->setDescription($jsonData['description']); 
    $Bien->setCategorie($jsonData['categorie']); 
    $Bien->setSousCategorie($jsonData['sous_categorie']); 






    $entityManager->flush(); 
    return $this->json([
        'status' => 201,
        'message' => "Bien updated succeffully" ,       
          ],201);   

}
     /**
     * @Route("/", name="Bien_create")
     * @Method({"GET"})
     */
    public function listReservationAction()
    {
        $Bien = $this->getDoctrine()->getRepository('autoagisBundle:Bien')->findAll();

        $data = $this->get('jms_serializer')->serialize($Bien, 'json', SerializationContext::create()->setGroups(array('list')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    /**
     * @Route("/{id}", name="Bien_show")
     */
    public function showBienAction(Bien $Bien)
    {
        $data = $this->get('jms_serializer')->serialize($Bien, 'json', SerializationContext::create()->setGroups(array('detail')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    } 
     /**
     * @Route("/{id}/delete" , name="Bien_delete")
     * @Method({"DELETE"})
     
     */
    public function deletAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Bien = $em->getRepository(Bien::class)->findOneById($id);
        if (!$Bien){
            $data = [
             'status' => 404,
             'errors' => "Bien not found",
            ];
            return $this->json($data, 404);
           }
        $em->remove($Bien);
        $em->flush();
        $data = [
            'status' => 200,
            'errors' => "Bien deleted successfully",
           ];
           return $this->json($data);
}

   
 

}
