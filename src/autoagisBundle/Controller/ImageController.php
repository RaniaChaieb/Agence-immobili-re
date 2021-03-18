<?php
namespace autoagisBundle\Controller;
use autoagisBundle\Entity\Image;
use App\Repository\ImageRepository;
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
 * image controller.
 * @Route("image")
 */
class ImageController extends Controller
{
/**
 * @Route("/add")
 */
public function AddimageAction(Request $request)
{
    $image = New Image();
    $em = $this->getDoctrine()->getManager();
    $data = json_decode($request->getContent(),true);
    $image->setImgNom($data['img_nom']);
    $image->setImgTaille($data['img_taille']);
    $image->setImgLien($data['img_lien']);
    $image->setTypeImage($data['type_image']);
    $request->getContent();
        $em->persist($image);
    $em->flush();
    $serializer = new Serializer([new ObjectNormalizer()]);
    $formatted = $serializer->normalize($image);
    $data = [
        'status' => 200,
        'errors' => "image added successfully",
       ];
       return $this->json($data);    }
    
    /**
     * @Route("/", name="image_create")
     * @Method({"GET"})
     */
       public function listimageAction()
       {   $images = $this->getDoctrine()->getRepository('autoagisBundle:Image')->findAll();
           $data = $this->get('jms_serializer')->serialize($images, 'json', SerializationContext::create()->setGroups(array('list')));
           $response = new Response($data);
           $response->headers->set('Content-Type', 'application/json');
           return $response; }
        /**
        * @Route("/{id}", name="image_show")
        */
       public function showimageAction(Image $image)
       {
           $data = $this->get('jms_serializer')->serialize($image, 'json', SerializationContext::create()->setGroups(array('detail')));
   
           $response = new Response($data);
           $response->headers->set('Content-Type', 'application/json');
   
           return $response;
       }
   
   /**
     * @Route("/{id}/delete" , name="image_delete")
     * @Method({"DELETE"})
     
     */
    public function deletAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository(Image::class)->findOneById($id);
        if (!$image){
            $data = [
             'status' => 404,
             'errors' => "image not found",
            ];
            return $this->json($data, 404);
           }
        $em->remove($image);
        $em->flush();
        $data = [
            'status' => 200,
            'errors' => "image deleted successfully",
           ];
           return $this->json($data);
}


 
/**
 * @Route("/{id}/edit")
 */
public function update($id,Request $request)
{
    $entityManager = $this->getDoctrine()->getManager();
    $image = $entityManager->getRepository(Image::class)->find($id);
    if (!$image) {
        throw $this->createNotFoundException(
            'No image found for id '.$id
        );
    }
    $data = json_decode($request->getContent(),true);
    $image->setImgNom($data['img_nom']);
    $image->setImgTaille($data['img_taille']);
    $image->setImgLien($data['img_lien']);
    $image->setTypeImage($data['type_image']);
    $request->getContent();
    $entityManager->flush();
    $data = [
        'status' => 200,
        'errors' => "image updated successfully",
       ];
       return $this->json($data);

   
    
}

}