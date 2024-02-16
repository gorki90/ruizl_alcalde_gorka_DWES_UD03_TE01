<?php
class Info{
function __construct(){

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