<?php

namespace autoagisBundle\Entity;
use JMS\Serializer\Annotation as Serializer;


use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="autoagisBundle\Repository\ImageRepository")
 */
class Image
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
     * @ORM\Column(name="type_image", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $typeImage;

    /**
     * @var float
     *
     * @ORM\Column(name="img_taille", type="float")
     * @Serializer\Groups({"detail", "list"})
     */
    private $imgTaille;

    /**
     * @var string
     *
     * @ORM\Column(name="img_nom", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $imgNom;

    /**
     * @var string
     *
     * @ORM\Column(name="img_lien", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $imgLien;


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
     * Set typeImage
     *
     * @param string $typeImage
     *
     * @return image
     */
    public function setTypeImage($typeImage)
    {
        $this->typeImage = $typeImage;

        return $this;
    }

    /**
     * Get typeImage
     *
     * @return string
     */
    public function getTypeImage()
    {
        return $this->typeImage;
    }

    /**
     * Set imgTaille
     *
     * @param float $imgTaille
     *
     * @return image
     */
    public function setImgTaille($imgTaille)
    {
        $this->imgTaille = $imgTaille;

        return $this;
    }

    /**
     * Get imgTaille
     *
     * @return float
     */
    public function getImgTaille()
    {
        return $this->imgTaille;
    }

    /**
     * Set imgNom
     *
     * @param string $imgNom
     *
     * @return image
     */
    public function setImgNom($imgNom)
    {
        $this->imgNom = $imgNom;

        return $this;
    }

    /**
     * Get imgNom
     *
     * @return string
     */
    public function getImgNom()
    {
        return $this->imgNom;
    }

    /**
     * Set imgLien
     *
     * @param string $imgLien
     *
     * @return image
     */
    public function setImgLien($imgLien)
    {
        $this->imgLien = $imgLien;

        return $this;
    }

    /**
     * Get imgLien
     *
     * @return string
     */
    public function getImgLien()
    {
        return $this->imgLien;
    }
}
