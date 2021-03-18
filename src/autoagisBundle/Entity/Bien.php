<?php

namespace autoagisBundle\Entity;
use JMS\Serializer\Annotation as Serializer;


use Doctrine\ORM\Mapping as ORM;

/**
 * Bien
 *
 * @ORM\Table(name="bien")
 * @ORM\Entity(repositoryClass="autoagisBundle\Repository\BienRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"Bien" = "Bien", "Habitation" = "Habitation", "commerciaux"="commerciaux"})
 */
class Bien
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
     * @var string
     *
     * @ORM\Column(name="type_bien", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $typeBien;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_bien", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $etatBien;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $transaction;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_bien", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $nomBien;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_bien", type="float")
     * @Serializer\Groups({"detail", "list"})
     */
    private $prixBien;

    /**
     * @var float
     *
     * @ORM\Column(name="superficie", type="float")
     * @Serializer\Groups({"detail", "list"})
     */
    private $superficie;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $rue;
    
    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $categorie;
    
    /**
     * @var string
     *
     * @ORM\Column(name="sous_categorie", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $sousCategorie;
    

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $description;
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
     * Set typeBien
     *
     * @param string $typeBien
     *
     * @return Bien
     */
    public function setTypeBien($typeBien)
    {
        $this->typeBien = $typeBien;

        return $this;
    }

    /**
     * Get typeBien
     *
     * @return string
     */
    public function getTypeBien()
    {
        return $this->typeBien;
    }

    /**
     * Set etatBien
     *
     * @param string $etatBien
     *
     * @return Bien
     */
    public function setEtatBien($etatBien)
    {
        $this->etatBien = $etatBien;

        return $this;
    }

    /**
     * Get etatBien
     *
     * @return string
     */
    public function getEtatBien()
    {
        return $this->etatBien;
    }

    /**
     * Set transaction
     *
     * @param string $transaction
     *
     * @return Bien
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return string
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Set nomBien
     *
     * @param string $nomBien
     *
     * @return Bien
     */
    public function setNomBien($nomBien)
    {
        $this->nomBien = $nomBien;

        return $this;
    }

    /**
     * Get nomBien
     *
     * @return string
     */
    public function getNomBien()
    {
        return $this->nomBien;
    }

    /**
     * Set prixBien
     *
     * @param float $prixBien
     *
     * @return Bien
     */
    public function setPrixBien($prixBien)
    {
        $this->prixBien = $prixBien;

        return $this;
    }

    /**
     * Get prixBien
     *
     * @return float
     */
    public function getPrixBien()
    {
        return $this->prixBien;
    }

    /**
     * Set superficie
     *
     * @param float $superficie
     *
     * @return Bien
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get superficie
     *
     * @return float
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Bien
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Bien
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Bien
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set rue
     *
     * @param string $rue
     *
     * @return Bien
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get rue
     *
     * @return string
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Bien
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
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
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Bien
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set sousCategorie
     *
     * @param string $sousCategorie
     *
     * @return Bien
     */
    public function setSousCategorie($sousCategorie)
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    /**
     * Get sousCategorie
     *
     * @return string
     */
    public function getSousCategorie()
    {
        return $this->sousCategorie;
    }
}
