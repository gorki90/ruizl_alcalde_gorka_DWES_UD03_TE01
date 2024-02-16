<?php

require "codigos.php";

class Info{
function __construct(){

}

function getAllSkillTrees(){
    $jsonContent = file_get_contents('../app/models/skillTrees.json');
    $json= json_decode($jsonContent,true);
    $datos= $json['data'];
    echo Codigos::success();
    header('Content-Type: application/json');
    echo json_encode($datos);

}

function getSkillTreeById($id){
    $jsonContent = file_get_contents('../app/models/skillTrees.json');
    $json= json_decode($jsonContent,true);
    $datos= $json['data'];
    $idExists=false;

foreach($datos as $skilltrees){
    if($id==$skilltrees['id']){
        echo Codigos::success();
        header('Content-Type: application/json');
        echo json_encode($skilltrees);
        $idExists=true;
    }
}

if(!$idExists){
    echo Codigos::notFound();
    echo "El id no existe";
}
    
}
}
    ?>
