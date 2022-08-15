<?php

namespace App\model;

class Usuario
{


    public function __construct(protected int $id, protected string $username, protected string $nombreCompleto, protected string $pass, protected string $email, protected bool $estado)
    {
    }


    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of pass
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

   

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
    
    /**
     * Get the value of nombreCompleto
     */ 
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set the value of nombreCompleto
     *
     * @return  self
     */ 
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    public static function fromArray(array $usuario): Usuario
    {
        return new self(
            id: $usuario['id'],
            username: $usuario['username'],
            nombreCompleto: $usuario['nombrecompleto'],
            pass: $usuario['pass'],
            email: $usuario['email'],
            estado: $usuario['estado'],
        );
    }

}
