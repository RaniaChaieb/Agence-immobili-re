<?php
namespace autoagisBundle\Controller;
use autoagisBundle\Entity\Compte;
use autoagisBundle\Entity\Bien;
use autoagisBundle\Entity\Publication;
use App\Repository\PublicationRepository;
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
 * Publication controller.
 *
 * @Route("Publication")
 */
class PublicationController extends Controller
{ /**
    * @Route("/add", methods={"POST"})
    */
   public function AddPublicationAction(Request $request)
       { 
       $em = $this->getDoctrine()->getManager();
           $data = $request->getContent();
           $jsonData = json_decode($data,true);
           $idbien = $jsonData['id_bien'];
           $bien = $this->getDoctrine()->getRepository(Bien::class)->find($idbien);
           $idCompte=$jsonData['id_compte'];
   
           $Compte = $this->getDoctrine()->getRepository(Compte::class)->find($idCompte);
   
           if(!$bien || !$Compte){
               return $this->json([
                   'message' => 'bien ou Compte n\'exist pas ',
                   'status' => 404
               ],404); }
           $encoders = [new JsonEncoder()];
           $normalizers = [new ObjectNormalizer()];
           $serializer = new Serializer($normalizers, $encoders);
           $Publication = $serializer->deserialize($data,Publication::class,'json');
           $Publication->setBien($bien); 
   
            $Publication->setCompte($Compte); 
           $em->persist($Publication);
           $em->flush();
           return $this->json([
               'status' => 201,
               'message' => "Publication added successfully",
              ],201);   
            }
/**
 * @Route("/{id}/edit")
 */
public function update($id,Request $request)
{
    $entityManager = $this->getDoctrine()->getManager();
    $Publication = $entityManager->getRepository(Publication::class)->find($id);
   if (!$Publication) {
        throw $this->createNotFoundException(
            'No Publication found for id '.$id);}
    $data = $request->getContent();
    $jsonData = json_decode($data,true);
    $idbien = $jsonData['id_bien'];
    $bien = $this->getDoctrine()->getRepository(Bien::class)->find($idbien);
    $idCompte=$jsonData['id_compte'];
    $Compte= $this->getDoctrine()->getRepository(Compte::class)->find($idCompte);
    $Publication->setBien($bien); 
    $Publication->setCompte($Compte); 
    $Publication->setDatePub($jsonData['date_pub']); 
    $Publication->setDescription($jsonData['description']); 

    $entityManager->flush(); 
    return $this->json([
        'status' => 201,
        'message' => "Publication updated succeffully" ,       
          ],201);   

}
    
    
    /**
    * @Route("/", name="pub_create")
    * @Method({"GET"})
    */
   public function listPublicationAction()
   {
       $publication = $this->getDoctrine()->getRepository('autoagisBundle:Publication')->findAll();

       $data = $this->get('jms_serializer')->serialize($publication, 'json', SerializationContext::create()->setGroups(array('list')));

       $response = new Response($data);
       $response->headers->set('Content-Type', 'application/json');

       return $response;
   }
   /**
     * @Route("/{id}", name="Publication_show")
     */
    public function showPublicationAction(Publication $Publication)
    {
        $data = $this->get('jms_serializer')->serialize($Publication, 'json', SerializationContext::create()->setGroups(array('detail')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
     /**
     * @Route("/{id}/delete" , name="Publication_delete")
     * @Method({"DELETE"})
     
     */
    public function deletAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Publication = $em->getRepository(Publication::class)->findOneById($id);
        if (!$Publication){
            $data = [
             'status' => 404,
             'errors' => "Publication not found",
            ];
            return $this->json($data, 404);
           }
        $em->remove($Publication);
        $em->flush();
        $data = [
            'status' => 200,
            'errors' => "Publication deleted successfully",
           ];
           return $this->json($data);
}

 
}