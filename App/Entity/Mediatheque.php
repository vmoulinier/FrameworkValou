<?php

namespace App\Entity;

/**
 * @Entity @Table(name="mediatheque")
 */
class Mediatheque
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="integer")
     * @var integer
     */
    protected $code_film;

    /**
     *
     * @ManyToOne(targetEntity="User", inversedBy="mediatheque", cascade={"persist", "merge"})
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     *
     * @ManyToOne(targetEntity="Groupe", inversedBy="mediatheque", cascade={"persist", "merge"})
     * @JoinColumn(name="groupe_id", referencedColumnName="id")
     */
    protected $groupe;


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
    public function getCodeFilm()
    {
        return $this->code_film;
    }

    /**
     * @param mixed $code_film
     */
    public function setCodeFilm($code_film)
    {
        $this->code_film = $code_film;
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
    public function setUser(User $user)
    {
        $this->user = $user;
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