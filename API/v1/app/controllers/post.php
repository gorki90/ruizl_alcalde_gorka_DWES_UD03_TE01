<?php
class Post{
function __construct(){

}

function getAllSkillTrees(){
   $jsonContent = file_get_contents("/API/v1/app/models/skillTrees.json");
   $json= json_decode($jsonContent);
   echo $json;
}

function getSkillTreeById($id){
    echo "Hola ".$id;
}

function createBuild($data){
    echo "Hola ".json_encode($data);
}

function updateBuild($id, $data){
    echo "Hola".$id .json_encode($data);
}

function deleteBuild($id){
    echo "Adios ".$id;
}

}

?>