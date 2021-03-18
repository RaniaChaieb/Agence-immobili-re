<?php

namespace autoagisBundle\Entity;
use JMS\Serializer\Annotation as Serializer;


use Doctrine\ORM\Mapping as ORM;

/**
 * commerciaux
 *
 * @ORM\Table(name="commerciaux")
 * @ORM\Entity(repositoryClass="autoagisBundle\Repository\commerciauxRepository")
 */
class commerciaux extends Bien
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_bureau", type="integer")
     * @Serializer\Groups({ "list"})
     */
    private $nbrBureau;
    
    /**
     * @var int
     *
     * @ORM\Column(name="nbr_salle_reunion", type="integer")
     * @Serializer\Groups({ "list"})
     */
    private $nbrSalleReunion;

    /**
     * @var bool
     *
     * @ORM\Column(name="meuble", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $meuble;

    /**
     * @var bool
     *
     * @ORM\Column(name="chauffage", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $chauffage;

    /**
     * @var bool
     *
     * @ORM\Column(name="cuisine", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $cuisine;

    /**
     * @var bool
     *
     * @ORM\Column(name="garage", type="boolean")
     */
    private $garage;

    /**
     * @var bool
     *
     * @ORM\Column(name="ascenceur", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $ascenceur;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_salle_bain", type="integer")
     * @Serializer\Groups({"detail", "list"})
     */
    private $nbrSalleBain;
     /**
     * @ORM\ManyToOne(targetEntity="autoagisBundle\Entity\Image")
     
     * @ORM\JoinColumn(name="id_image", referencedColumnName="id")
     * @Serializer\Groups({"detail", "list"})
     */
    private $image;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nbrBureau
     *
     * @param integer $nbrBureau
     *
     * @return commerciaux
     */
    public function setNbrBureau($nbrBureau)
    {
        $this->nbrBureau = $nbrBureau;

        return $this;
    }

    /**
     * Get nbrBureau
     *
     * @return int
     */
    public function getNbrBureau()
    {
        return $this->nbrBureau;
    }

    /**
     * Set meuble
     *
     * @param boolean $meuble
     *
     * @return commerciaux
     */
    public function setMeuble($meuble)
    {
        $this->meuble = $meuble;

        return $this;
    }

    /**
     * Get meuble
     *
     * @return bool
     */
    public function getMeuble()
    {
        return $this->meuble;
    }

    /**
     * Set chauffage
     *
     * @param boolean $chauffage
     *
     * @return commerciaux
     */
    public function setChauffage($chauffage)
    {
        $this->chauffage = $chauffage;

        return $this;
    }

    /**
     * Get chauffage
     *
     * @return bool
     */
    public function getChauffage()
    {
        return $this->chauffage;
    }

    /**
     * Set cuisine
     *
     * @param boolean $cuisine
     *
     * @return commerciaux
     */
    public function setCuisine($cuisine)
    {
        $this->cuisine = $cuisine;

        return $this;
    }

    /**
     * Get cuisine
     *
     * @return bool
     */
    public function getCuisine()
    {
        return $this->cuisine;
    }

    /**
     * Set garage
     *
     * @param boolean $garage
     *
     * @return commerciaux
     */
    public function setGarage($garage)
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * Get garage
     *
     * @return bool
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * Set ascenceur
     *
     * @param boolean $ascenceur
     *
     * @return commerciaux
     */
    public function setAscenceur($ascenceur)
    {
        $this->ascenceur = $ascenceur;

        return $this;
    }

    /**
     * Get ascenceur
     *
     * @return bool
     */
    public function getAscenceur()
    {
        return $this->ascenceur;
    }

    /**
     * Set nbrSalleBain
     *
     * @param integer $nbrSalleBain
     *
     * @return commerciaux
     */
    public function setNbrSalleBain($nbrSalleBain)
    {
        $this->nbrSalleBain = $nbrSalleBain;

        return $this;
    }

    /**
     * Get nbrSalleBain
     *
     * @return int
     */
    public function getNbrSalleBain()
    {
        return $this->nbrSalleBain;
    }  /**
    * Set image
    *
    * @param \autoagisBundle\Entity\Image $image
    *
    * @return Bien
    */
   public function setImage(\autoagisBundle\Entity\Image $image = null)
   {
       $this->Image = $image;

       return $this;
   }

   /**
    * Get image
    *
    * @return \autoagisBundle\Entity\Image
    */
   public function getImage()
   {
       return $this->Image;
   }

    /**
     * Set nbrSalleReunion
     *
     * @param integer $nbrSalleReunion
     *
     * @return commerciaux
     */
    public function setNbrSalleReunion($nbrSalleReunion)
    {
        $this->nbrSalleReunion = $nbrSalleReunion;

        return $this;
    }

    /**
     * Get nbrSalleReunion
     *
     * @return integer
     */
    public function getNbrSalleReunion()
    {
        return $this->nbrSalleReunion;
    }
}
