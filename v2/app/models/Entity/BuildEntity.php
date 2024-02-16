<?php

class BuildEntity{

    private $id_build;
    private $nombre_build;
    private $descripcion_build;
    private $skill_trees;
    private $abilities;
    private $equipment_head;
    private $equipment_chest;
    private $equipment_foot;
    private $equipment_weapon1;
    private $equipment_weapon2;
    private $equipment_tent;
    private $id_autor;
    private $equipment_backpack;


public __construct($nombre_build, $descripcion_build, $skill_trees, $abilities
, $equipment_head, $equipment_chest, $equipment_foot, $equipment_weapon1, $equipment_weapon2, $equipment_tent, $id_autor
, $equipment_backpack){

$this->nombre_build=$nombre_build;
$this->descripcion_build=$descripcion_build;
$this->skill_trees=$skill_trees;
$this->abilities=$abilities;
$this->equipment_head=$equipment_head;
$this->equipment_chest=$equipment_chest;
$this->equipment_foot=$equipment_foot;
$this->equipment_weapon1=$equipment_weapon1;
$this->equipment_weapon2=$equipment_weapon2;
$this->equipment_tent=$equipment_tent;
$this->id_autor=$id_autor;
$this->equipment_backpack=$equipment_backpack;
}




    /**
     * Get the value of id_build
     */
    public function getIdBuild()
    {
        return $this->id_build;
    }

    /**
     * Set the value of id_build
     */
    public function setIdBuild($id_build): self
    {
        $this->id_build = $id_build;

        return $this;
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
     * Get the value of descripcion_build
     */
    public function getDescripcionBuild()
    {
        return $this->descripcion_build;
    }

    /**
     * Set the value of descripcion_build
     */
    public function setDescripcionBuild($descripcion_build): self
    {
        $this->descripcion_build = $descripcion_build;

        return $this;
    }

    /**
     * Get the value of skill_trees
     */
    public function getSkillTrees()
    {
        return $this->skill_trees;
    }

    /**
     * Set the value of skill_trees
     */
    public function setSkillTrees($skill_trees): self
    {
        $this->skill_trees = $skill_trees;

        return $this;
    }

    /**
     * Get the value of abilities
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * Set the value of abilities
     */
    public function setAbilities($abilities): self
    {
        $this->abilities = $abilities;

        return $this;
    }

    /**
     * Get the value of equipment_head
     */
    public function getEquipmentHead()
    {
        return $this->equipment_head;
    }

    /**
     * Set the value of equipment_head
     */
    public function setEquipmentHead($equipment_head): self
    {
        $this->equipment_head = $equipment_head;

        return $this;
    }

    /**
     * Get the value of equipment_chest
     */
    public function getEquipmentChest()
    {
        return $this->equipment_chest;
    }

    /**
     * Set the value of equipment_chest
     */
    public function setEquipmentChest($equipment_chest): self
    {
        $this->equipment_chest = $equipment_chest;

        return $this;
    }

    /**
     * Get the value of equipment_foot
     */
    public function getEquipmentFoot()
    {
        return $this->equipment_foot;
    }

    /**
     * Set the value of equipment_foot
     */
    public function setEquipmentFoot($equipment_foot): self
    {
        $this->equipment_foot = $equipment_foot;

        return $this;
    }

    /**
     * Get the value of equipment_weapon1
     */
    public function getEquipmentWeapon1()
    {
        return $this->equipment_weapon1;
    }

    /**
     * Set the value of equipment_weapon1
     */
    public function setEquipmentWeapon1($equipment_weapon1): self
    {
        $this->equipment_weapon1 = $equipment_weapon1;

        return $this;
    }

    /**
     * Get the value of equipment_weapon2
     */
    public function getEquipmentWeapon2()
    {
        return $this->equipment_weapon2;
    }

    /**
     * Set the value of equipment_weapon2
     */
    public function setEquipmentWeapon2($equipment_weapon2): self
    {
        $this->equipment_weapon2 = $equipment_weapon2;

        return $this;
    }

    /**
     * Get the value of equipment_tent
     */
    public function getEquipmentTent()
    {
        return $this->equipment_tent;
    }

    /**
     * Set the value of equipment_tent
     */
    public function setEquipmentTent($equipment_tent): self
    {
        $this->equipment_tent = $equipment_tent;

        return $this;
    }

    /**
     * Get the value of id_autor
     */
    public function getIdAutor()
    {
        return $this->id_autor;
    }

    /**
     * Set the value of id_autor
     */
    public function setIdAutor($id_autor): self
    {
        $this->id_autor = $id_autor;

        return $this;
    }

    /**
     * Get the value of equipment_backpack
     */
    public function getEquipmentBackpack()
    {
        return $this->equipment_backpack;
    }

    /**
     * Set the value of equipment_backpack
     */
    public function setEquipmentBackpack($equipment_backpack): self
    {
        $this->equipment_backpack = $equipment_backpack;

        return $this;
    }

}
?>