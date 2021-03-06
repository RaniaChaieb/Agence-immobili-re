<?php

namespace autoagisBundle\Entity;
use JMS\Serializer\Annotation as Serializer;


use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="autoagisBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Groups({"list"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_utilisateur", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $nomUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_utilisateur", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $prenomUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_utilisateur", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $adresseUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="tel1", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $tel1;

    /**
     * @var string
     *
     * @ORM\Column(name="tel2", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $tel2;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $email;
     /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255)
     * @Serializer\Groups({"detail", "list"})
     */
    private $cin;


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
     * Set nomUtilisateur
     *
     * @param string $nomUtilisateur
     *
     * @return Utilisateur
     */
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    /**
     * Get nomUtilisateur
     *
     * @return string
     */
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * Set prenomUtilisateur
     *
     * @param string $prenomUtilisateur
     *
     * @return Utilisateur
     */
    public function setPrenomUtilisateur($prenomUtilisateur)
    {
        $this->prenomUtilisateur = $prenomUtilisateur;

        return $this;
    }

    /**
     * Get prenomUtilisateur
     *
     * @return string
     */
    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    /**
     * Set adresseUtilisateur
     *
     * @param string $adresseUtilisateur
     *
     * @return Utilisateur
     */
    public function setAdresseUtilisateur($adresseUtilisateur)
    {
        $this->adresseUtilisateur = $adresseUtilisateur;

        return $this;
    }

    /**
     * Get adresseUtilisateur
     *
     * @return string
     */
    public function getAdresseUtilisateur()
    {
        return $this->adresseUtilisateur;
    }

    /**
     * Set tel1
     *
     * @param string $tel1
     *
     * @return Utilisateur
     */
    public function setTel1($tel1)
    {
        $this->tel1 = $tel1;

        return $this;
    }

    /**
     * Get tel1
     *
     * @return string
     */
    public function getTel1()
    {
        return $this->tel1;
    }

    /**
     * Set tel2
     *
     * @param string $tel2
     *
     * @return Utilisateur
     */
    public function setTel2($tel2)
    {
        $this->tel2 = $tel2;

        return $this;
    }

    /**
     * Get tel2
     *
     * @return string
     */
    public function getTel2()
    {
        return $this->tel2;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Utilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cin
     *
     * @param string $cin
     *
     * @return Utilisateur
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }
}
