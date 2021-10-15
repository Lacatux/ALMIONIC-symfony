<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matricula
 *
 * @ORM\Table(name="matricula", indexes={@ORM\Index(name="id_curso", columns={"id_curso"}), @ORM\Index(name="id_usuario", columns={"id_usuario"})})
 * @ORM\Entity
 */
class Matricula
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
     * @ORM\Column(name="asignatura", type="string", length=50, nullable=true)
     */
    private $asignatura;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nota", type="integer", nullable=true)
     */
    private $nota;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;

    /**
     * @var \Curso
     *
     * @ORM\ManyToOne(targetEntity="Curso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_curso", referencedColumnName="id")
     * })
     */
    private $idCurso;

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
    public function getAsignatura(): ?string
    {
        return $this->asignatura;
    }

    /**
     * @param string|null $asignatura
     */
    public function setAsignatura(?string $asignatura): void
    {
        $this->asignatura = $asignatura;
    }

    /**
     * @return int|null
     */
    public function getNota(): ?int
    {
        return $this->nota;
    }

    /**
     * @param int|null $nota
     */
    public function setNota(?int $nota): void
    {
        $this->nota = $nota;
    }

    /**
     * @return \Usuario
     */
    public function getIdUsuario(): \Usuario
    {
        return $this->idUsuario;
    }

    /**
     * @param \Usuario $idUsuario
     */
    public function setIdUsuario(\Usuario $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return \Curso
     */
    public function getIdCurso(): \Curso
    {
        return $this->idCurso;
    }

    /**
     * @param \Curso $idCurso
     */
    public function setIdCurso(\Curso $idCurso): void
    {
        $this->idCurso = $idCurso;
    }


}
