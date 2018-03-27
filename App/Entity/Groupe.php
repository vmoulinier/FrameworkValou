<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="groupe")
 */
class Groupe
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @OneToMany(targetEntity="Mediatheque", mappedBy="groupe")
     * @JoinColumn(nullable=true)
     */
    protected $mediatheque;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $nom;

    /**
     * @OneToMany(targetEntity="user", mappedBy="groupe")
     * @JoinColumn(nullable=true)
     */
    protected $user;

    /**
     * Groupe constructor.
     */
    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->mediatheque = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMediatheque()
    {
        return $this->mediatheque;
    }

    /**
     * @param mixed $mediatheque
     */
    public function setMediatheque($mediatheque)
    {
        $this->mediatheque = $mediatheque;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

}