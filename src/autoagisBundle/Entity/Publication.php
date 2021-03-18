<?php

namespace autoagisBundle\Entity;
use JMS\Serializer\Annotation as Serializer;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="autoagisBundle\Repository\PublicationRepository")
 */
class Publication
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
     * @ORM\Column(name="description", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_pub", type="datetime")
     * @Serializer\Groups({"detail", "list"})
     */
    private $datePub;
       /**
     * @ORM\ManyToOne(targetEntity="autoagisBundle\Entity\Bien")
     
     * @ORM\JoinColumn(name="id_bien", referencedColumnName="id")
     * @Serializer\Groups({"detail", "list"})
     */
    private $bien;
       /**
     * @ORM\ManyToOne(targetEntity="autoagisBundle\Entity\Compte")
     
     * @ORM\JoinColumn(name="id_compte", referencedColumnName="id")
     * @Serializer\Groups({"detail", "list"})
     */
    private $compte;


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
     * Set description
     *
     * @param string $description
     *
     * @return Publication
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
     * Set datePub
     *
     * @param \DateTime $datePub
     *
     * @return Publication
     */
    public function setDatePub($datePub)
    {
        $this->datePub = new \DateTime($datePub);

        return $this;
    }

    /**
     * Get datePub
     *
     * @return \DateTime
     */
    public function getDatePub()
    {
        return $this->datePub;
    }

    /**
     * Set bien
     *
     * @param \autoagisBundle\Entity\Bien $bien
     *
     * @return Publication
     */
    public function setBien(\autoagisBundle\Entity\Bien $bien = null)
    {
        $this->bien = $bien;

        return $this;
    }

    /**
     * Get bien
     *
     * @return \autoagisBundle\Entity\Bien
     */
    public function getBien()
    {
        return $this->bien;
    }

    /**
     * Set compte
     *
     * @param \autoagisBundle\Entity\Compte $compte
     *
     * @return Publication
     */
    public function setCompte(\autoagisBundle\Entity\Compte $compte = null)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get compte
     *
     * @return \autoagisBundle\Entity\Compte
     */
    public function getCompte()
    {
        return $this->compte;
    }
}
