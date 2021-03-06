<?php

namespace autoagisBundle\Entity;
use JMS\Serializer\Annotation as Serializer;
use Doctrine\ORM\Mapping as ORM;

/**
 * Habitation
 *
 * @ORM\Table(name="habitation")
 * @ORM\Entity(repositoryClass="autoagisBundle\Repository\HabitationRepository")
 */
class Habitation extends Bien
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Groups({ "list"})
     */
    private $id;
     /**
     * @var integer
     *
     * @ORM\Column(name="nbr_suite_parental", type="integer")
     * @Serializer\Groups({"detail", "list"})
     */
    private $nbrSuiteParental;
       /**
     * @var integer
     *
     * @ORM\Column(name="nbr_salle_eau", type="integer")
     * @Serializer\Groups({"detail", "list"})
     */
    private $nbrSalleEau;


    /**
     * @var int
     *
     * @ORM\Column(name="nbr_chambre", type="integer")
     * @Serializer\Groups({"detail", "list"})
     */
    private $nbrChambre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_salon", type="integer")
     * @Serializer\Groups({"detail", "list"})
     */
    private $nbrSalon;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_salle_bain", type="integer")
     * @Serializer\Groups({"detail", "list"})
     */
    private $nbrSalleBain;

    /**
     * @var bool
     *
     * @ORM\Column(name="jardin", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $jardin;

    /**
     * @var bool
     *
     * @ORM\Column(name="garage", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $garage;

    /**
     * @var bool
     *
     * @ORM\Column(name="piscine", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $piscine;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_garage", type="integer")
     * @Serializer\Groups({"detail", "list"})
     */
    private $nbrGarage;

    /**
     * @var bool
     *
     * @ORM\Column(name="ascenseur", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $ascenseur;

    /**
     * @var bool
     *
     * @ORM\Column(name="gaz_de_ville", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $gazDeVille;

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
     * @ORM\Column(name="meuble", type="boolean")
     * @Serializer\Groups({"detail", "list"})
     */
    private $meuble;

    /**
     * @var float
     *
     * @ORM\Column(name="metrage", type="float")
     * @Serializer\Groups({"detail", "list"})
     */
    private $metrage;
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
     * Set nbrChambre
     *
     * @param integer $nbrChambre
     *
     * @return Habitation
     */
    public function setNbrChambre($nbrChambre)
    {
        $this->nbrChambre = $nbrChambre;

        return $this;
    }

    /**
     * Get nbrChambre
     *
     * @return int
     */
    public function getNbrChambre()
    {
        return $this->nbrChambre;
    }

    /**
     * Set nbrSalon
     *
     * @param integer $nbrSalon
     *
     * @return Habitation
     */
    public function setNbrSalon($nbrSalon)
    {
        $this->nbrSalon = $nbrSalon;

        return $this;
    }

    /**
     * Get nbrSalon
     *
     * @return int
     */
    public function getNbrSalon()
    {
        return $this->nbrSalon;
    }

    /**
     * Set nbrSalleBain
     *
     * @param integer $nbrSalleBain
     *
     * @return Habitation
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
    }

    /**
     * Set jardin
     *
     * @param boolean $jardin
     *
     * @return Habitation
     */
    public function setJardin($jardin)
    {
        $this->jardin = $jardin;

        return $this;
    }

    /**
     * Get jardin
     *
     * @return bool
     */
    public function getJardin()
    {
        return $this->jardin;
    }

    /**
     * Set garage
     *
     * @param boolean $garage
     *
     * @return Habitation
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
     * Set piscine
     *
     * @param boolean $piscine
     *
     * @return Habitation
     */
    public function setPiscine($piscine)
    {
        $this->piscine = $piscine;

        return $this;
    }

    /**
     * Get piscine
     *
     * @return bool
     */
    public function getPiscine()
    {
        return $this->piscine;
    }

    /**
     * Set nbrGarage
     *
     * @param integer $nbrGarage
     *
     * @return Habitation
     */
    public function setNbrGarage($nbrGarage)
    {
        $this->nbrGarage = $nbrGarage;

        return $this;
    }

    /**
     * Get nbrGarage
     *
     * @return int
     */
    public function getNbrGarage()
    {
        return $this->nbrGarage;
    }

    /**
     * Set ascenseur
     *
     * @param boolean $ascenseur
     *
     * @return Habitation
     */
    public function setAscenseur($ascenseur)
    {
        $this->ascenseur = $ascenseur;

        return $this;
    }

    /**
     * Get ascenseur
     *
     * @return bool
     */
    public function getAscenseur()
    {
        return $this->ascenseur;
    }

    /**
     * Set gazDeVille
     *
     * @param boolean $gazDeVille
     *
     * @return Habitation
     */
    public function setGazDeVille($gazDeVille)
    {
        $this->gazDeVille = $gazDeVille;

        return $this;
    }

    /**
     * Get gazDeVille
     *
     * @return bool
     */
    public function getGazDeVille()
    {
        return $this->gazDeVille;
    }

    /**
     * Set chauffage
     *
     * @param boolean $chauffage
     *
     * @return Habitation
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
     * Set meuble
     *
     * @param boolean $meuble
     *
     * @return Habitation
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
     * Set metrage
     *
     * @param float $metrage
     *
     * @return Habitation
     */
    public function setMetrage($metrage)
    {
        $this->metrage = $metrage;

        return $this;
    }

    /**
     * Get metrage
     *
     * @return float
     */
    public function getMetrage()
    {
        return $this->metrage;
    }

    /**
     * Set nbrSuiteParental
     *
     * @param integer $nbrSuiteParental
     *
     * @return Habitation
     */
    public function setNbrSuiteParental($nbrSuiteParental)
    {
        $this->nbrSuiteParental = $nbrSuiteParental;

        return $this;
    }

    /**
     * Get nbrSuiteParental
     *
     * @return integer
     */
    public function getNbrSuiteParental()
    {
        return $this->nbrSuiteParental;
    }

    /**
     * Set nbrSalleEau
     *
     * @param integer $nbrSalleEau
     *
     * @return Habitation
     */
    public function setNbrSalleEau($nbrSalleEau)
    {
        $this->nbrSalleEau = $nbrSalleEau;

        return $this;
    }

    /**
     * Get nbrSalleEau
     *
     * @return integer
     */
    public function getNbrSalleEau()
    {
        return $this->nbrSalleEau;
    }
}
