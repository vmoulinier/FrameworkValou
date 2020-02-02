<?php
namespace App\Entity;

/**
 * @Entity @Table(name="translations")
 */
class Translations
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
    private $name;

    /**
     * @Column(type="string")
     * @var string
     */
    private $fr;

    /**
     * @Column(type="string")
     * @var string
     */
    private $en;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFr(): string
    {
        return $this->fr;
    }

    /**
     * @param string $fr
     */
    public function setFr(string $fr)
    {
        $this->fr = $fr;
    }

    /**
     * @return string
     */
    public function getEn(): string
    {
        return $this->en;
    }

    /**
     * @param string $en
     */
    public function setEn(string $en)
    {
        $this->en = $en;
    }

}