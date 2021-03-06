<?php

namespace autoagisBundle\Entity;
use JMS\Serializer\Annotation as Serializer;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="autoagisBundle\Repository\ReservationRepository")
 */
class Reservations
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_res", type="datetime")
     * @Serializer\Groups({"detail", "list"})
     */
    private $dateRes;
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_visite", type="datetime")
     * @Serializer\Groups({"detail", "list"})
     */
    private $dateVisite;
     /**
     * @ORM\ManyToOne(targetEntity="autoagisBundle\Entity\Bien")
     
     * @ORM\JoinColumn(name="id_bien", referencedColumnName="id")
     * @Serializer\Groups({"detail", "list"})
     */
    private $bien;
       /**
     * @ORM\ManyToOne(targetEntity="autoagisBundle\Entity\Utilisateur")
     
     * @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id")
     * @Serializer\Groups({"detail", "list"})
     */
    private $utilisateur;

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
     * Set dateRes
     *
     * @param \DateTime $dateRes
     *
     * @return Reservation
     */
    public function setDateRes($dateRes)
    {
        $this->dateRes = new \DateTime($dateRes);

        return $this;
    }

    /**
     * Get dateRes
     *
     * @return \DateTime
     */
    public function getDateRes()
    {
        return $this->dateRes;
    }

    /**
     * Set bien
     *
     * @param \autoagisBundle\Entity\Bien $bien
     *
     * @return Reservation
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
     * Set utilisateur
     *
     * @param \autoagisBundle\Entity\Utilisateur $utilisateur
     *
     * @return Reservation
     */
    public function setUtilisateur(\autoagisBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \autoagisBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set dateVisite
     *
     * @param \DateTime $dateVisite
     *
     * @return Reservations
     */
    public function setDateVisite($dateVisite)
    {
        $this->dateVisite = new \DateTime($dateVisite);

        return $this;
    }

    /**
     * Get dateVisite
     *
     * @return \DateTime
     */
    public function getDateVisite()
    {
        return $this->dateVisite;
    }
}
