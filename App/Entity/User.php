<?php

namespace App\Entity;

use App\Model\SPDO;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="user")
 */
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @Column(type="string")
     * @var string
     */
    private $nom;

    /**
     * @Column(type="string")
     * @var string
     */
    private $prenom;

    /**
     * @Column(type="string")
     * @var string
     */
    private $password;

    /**
     * @Column(type="string", options={"default" : "ROLE_USER"})
     * @var string
     */
    private $type = "ROLE_USER";

    /**
     * @Column(type="string")
     * @var string
     */
    private $email;

    /**
     * @OneToMany(targetEntity="Mediatheque", mappedBy="user")
     * @JoinColumn(nullable=true)
     */
    private $mediatheque;

    /**
     *
     * @ManyToOne(targetEntity="Groupe", inversedBy="user", cascade={"persist", "merge"})
     * @JoinColumn(name="groupe_id", referencedColumnName="id")
     */
    private $groupe;
    
    public function __construct()
    {
        $this->mediatheque = new ArrayCollection();
        $this->groupe = new ArrayCollection();
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    public function setMediatheque(Mediatheque $mediatheque)
    {
        $this->mediatheque = $mediatheque;
    }

    /**
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @param mixed $groupe
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;
    }
}