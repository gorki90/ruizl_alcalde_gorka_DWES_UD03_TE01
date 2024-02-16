<?php

class BuildDTO implements JsonSerializable {
 
    private $nombre_build;
    private $username_autor;
    

    public function __construct($nombre_build, $username_autor){

$this->nombre_build=$nombre_build;
$this->username_autor=$username_autor;

}


    public function jsonSerialize(){
        return get_object_vars($this);
    }

    


    /**
     * Get the value of nombre_build
     */
    public function getNombreBuild()
    {
        return $this->nombre_build;
    }

    /**
     * Set the value of nombre_build
     */
    public function setNombreBuild($nombre_build): self
    {
        $this->nombre_build = $nombre_build;

        return $this;
    }

    /**
     * Get the value of username_autor
     */
    public function getUsernameAutor()
    {
        return $this->username_autor;
    }

    /**
     * Set the value of username_autor
     */
    public function setUsernameAutor($username_autor): self
    {
        $this->username_autor = $username_autor;

        return $this;
    }
}

?>