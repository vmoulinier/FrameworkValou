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
     * @return Translations
     */
    public function setId(int $id): Translations
    {
        $this->id = $id;
        return $this;
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
     * @return Translations
     */
    public function setName(string $name): Translations
    {
        $this->name = $name;
        return $this;
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
     * @return Translations
     */
    public function setFr(string $fr): Translations
    {
        $this->fr = $fr;
        return $this;
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
     * @return Translations
     */
    public function setEn(string $en): Translations
    {
        $this->en = $en;
        return $this;
    }

}
