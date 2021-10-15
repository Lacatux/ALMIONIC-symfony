<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user", type="string", length=20, nullable=true)
     */
    private $user;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pwd", type="string", length=30, nullable=true)
     */
    private $pwd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=20, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido1", type="string", length=20, nullable=true)
     */
    private $apellido1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido2", type="string", length=20, nullable=true)
     */
    private $apellido2;

    /**
     * @var int
     *
     * @ORM\Column(name="tipo", type="integer", nullable=false)
     */
    private $tipo;

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
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @param string|null $user
     */
    public function setUser(?string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string|null
     */
    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    /**
     * @param string|null $pwd
     */
    public function setPwd(?string $pwd): void
    {
        $this->pwd = $pwd;
    }

    /**
     * @return string|null
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string|null $nombre
     */
    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string|null
     */
    public function getApellido1(): ?string
    {
        return $this->apellido1;
    }

    /**
     * @param string|null $apellido1
     */
    public function setApellido1(?string $apellido1): void
    {
        $this->apellido1 = $apellido1;
    }

    /**
     * @return string|null
     */
    public function getApellido2(): ?string
    {
        return $this->apellido2;
    }

    /**
     * @param string|null $apellido2
     */
    public function setApellido2(?string $apellido2): void
    {
        $this->apellido2 = $apellido2;
    }

    /**
     * @return int
     */
    public function getTipo(): int
    {
        return $this->tipo;
    }

    /**
     * @param int $tipo
     */
    public function setTipo(int $tipo): void
    {
        $this->tipo = $tipo;
    }


}
