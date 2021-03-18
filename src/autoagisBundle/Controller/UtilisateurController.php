<?php
namespace autoagisBundle\Controller;
use autoagisBundle\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
/**
 * Utilisateur controller.
 * @Route("utilisateur")
 */
class UtilisateurController extends Controller
{
/**
 * @Route("/add")
 */
public function AddUtilisateurAction(Request $request)
{
    $Utilisateur = New Utilisateur();
    $em = $this->getDoctrine()->getManager();
    $data = json_decode($request->getContent(),true);
    $Utilisateur->setNomUtilisateur($data['nom_utilisateur']);
    $Utilisateur->setPrenomUtilisateur($data['prenom_utilisateur']);
    $Utilisateur->setTel1($data['tel1']);
    $Utilisateur->setTel2($data['tel2']);
    $Utilisateur->setAdresseUtilisateur($data['adresse_utilisateur']);
    $Utilisateur->setCin($data['cin']);
    $Utilisateur->setEmail($data['email']);
    $request->getContent();
        $em->persist($Utilisateur);
    $em->flush();
    $serializer = new Serializer([new ObjectNormalizer()]);
    $formatted = $serializer->normalize($Utilisateur);
    $data = [
        'status' => 200,
        'errors' => "Utilisateur added successfully",
       ];
       return $this->json($data);    }
    /**
     * @Route("/", name="utilisateur_create")
     * @Method({"GET"})
     */
    public function listUtilisateurAction()
    {
        $Utilisateurs = $this->getDoctrine()->getRepository('autoagisBundle:Utilisateur')->findAll();

        $data = $this->get('jms_serializer')->serialize($Utilisateurs, 'json', SerializationContext::create()->setGroups(array('list')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
     /**
     * @Route("/{id}", name="Utilisateur_show")
     */
    public function showUtilisateurAction(Utilisateur $Utilisateur)
    {
        $data = $this->get('jms_serializer')->serialize($Utilisateur, 'json', SerializationContext::create()->setGroups(array('detail')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
   
   /**
     * @Route("/{id}/delete" , name="Utilisateur_delete")
     * @Method({"DELETE"})
     
     */
    public function deletAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Utilisateur = $em->getRepository(Utilisateur::class)->findOneById($id);
        if (!$Utilisateur){
            $data = [
             'status' => 404,
             'errors' => "Utilisateur not found",
            ];
            return $this->json($data, 404);
           }
        $em->remove($Utilisateur);
        $em->flush();
        $data = [
            'status' => 200,
            'errors' => "Utilisateur deleted successfully",
           ];
           return $this->json($data);
}


 
/**
 * @Route("/{id}/edit")
 */
public function update($id,Request $request)
{
    $entityManager = $this->getDoctrine()->getManager();
    $Utilisateur = $entityManager->getRepository(Utilisateur::class)->find($id);
    if (!$Utilisateur) {
        throw $this->createNotFoundException(
            'No Utilisateur found for id '.$id
        );
    }
    $data = json_decode($request->getContent(),true);
    $Utilisateur->setNomUtilisateur($data['nom_utilisateur']);
    $Utilisateur->setPrenomUtilisateur($data['prenom_utilisateur']);
    $Utilisateur->setCin($data['cin']);
    $Utilisateur->setAdresseUtilisateur($data['adresse_utilisateur']);
    $Utilisateur->setTel1($data['tel1']);
    $Utilisateur->setTel2($data['tel2']);
    $Utilisateur->setEmail($data['email']);

    $request->getContent();
    $entityManager->flush();
    $data = [
        'status' => 200,
        'errors' => "Utilisateur updated successfully",
       ];
       return $this->json($data);

   
    
}

}