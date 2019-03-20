<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 3.0.3 (doctrine2-annotationsf3) on 2019-03-19 18:11:41.
 * Goto
 * https://github.com/mysql-workbench-schema-exporter/mysql-workbench-schema-exporter
 * for more information.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * AppBundle\Entity\Correo
 *
 * @ORM\Entity()
 * @ORM\Table(name="Correos")
 * @ORM\HasLifecycleCallbacks()
 */
class Correo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $tipo;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $correo;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     */
    protected $activos= false;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $creado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $actualizado;

    public function __construct()
    {
    }

    public function __toString()
    {
        return $this->nombre;
    }

    /**
    * Gets triggered only on insert
    * @ORM\PrePersist
    */
    public function onPrePersist(){
        $this->creado = new \DateTime("now"); 
    }

    /**
    * Gets triggered only on update
    * @ORM\PreUpdate
    */
    public function onPreUpdate(){
        $this->actualizado = new \DateTime("now"); 
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \AppBundle\Entity\Correo
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of tipo.
     *
     * @param string $tipo
     * @return \AppBundle\Entity\Correo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of tipo.
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \AppBundle\Entity\Correo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of correo.
     *
     * @param string $correo
     * @return \AppBundle\Entity\Correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of correo.
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of activos.
     *
     * @param boolean $activos
     * @return \AppBundle\Entity\Correo
     */
    public function setActivos($activos)
    {
        $this->activos = $activos;

        return $this;
    }

    /**
     * Get the value of activos.
     *
     * @return boolean
     */
    public function getActivos()
    {
        return $this->activos;
    }

    /**
     * Set the value of creado.
     *
     * @param \DateTime $creado
     * @return \AppBundle\Entity\Correo
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;

        return $this;
    }

    /**
     * Get the value of creado.
     *
     * @return \DateTime
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * Set the value of actualizado.
     *
     * @param \DateTime $actualizado
     * @return \AppBundle\Entity\Correo
     */
    public function setActualizado($actualizado)
    {
        $this->actualizado = $actualizado;

        return $this;
    }

    /**
     * Get the value of actualizado.
     *
     * @return \DateTime
     */
    public function getActualizado()
    {
        return $this->actualizado;
    }

    public function __sleep()
    {
        return array('id', 'tipo', 'nombre', 'correo', 'activos', 'creado', 'actualizado');
    }
}