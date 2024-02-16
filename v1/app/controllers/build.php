<?php

class Build{
function __construct(){

}



function seeBuilds(){
    $jsonContent = file_get_contents('../app/models/builds.json');
    $json= json_decode($jsonContent,true);
    echo Codigos::success();
    header('Content-Type: application/json');
    echo json_encode($json);
}

function seeBuildsbyid($id){
    $jsonContent = file_get_contents('../app/models/builds.json');
    $json= json_decode($jsonContent,true);
    $idExists=false;

foreach($json as $key => $build){
    if(isset($build['id']) && $build['id'] == $id){
        echo Codigos::success();
        header('Content-Type: application/json');
        echo json_encode($json[$key]);
        $idExists=true;
    }
}

if(!$idExists){
    echo Codigos::notFound();
    echo "El id no existe";
}
}

function createBuild(){
    $data = file_get_contents('php://input');
    if (empty($data)) {
        echo json_encode(["error" => "No se han pasado datos"]);
        echo Codigos::badRequest();
        return;
    }

    $datos = json_decode($data, true);
    if ($datos === null) {
        echo json_encode(["error" => "Datos de Json inválidos"]);
        echo Codigos::badRequest();
        return;
    }

    $jsonContent = file_get_contents('../app/models/builds.json');
    $json = json_decode($jsonContent, true);

    $json[] = $datos;

    file_put_contents('../app/models/builds.json', json_encode($json, JSON_PRETTY_PRINT));

    header('Content-Type: application/json');
    echo Codigos::created();
}


function updateBuild($id, $data) {
    $jsonContent = file_get_contents('../app/models/builds.json');
    $json = json_decode($jsonContent, true);

    $existe = false;
    foreach ($json as $key => $build) {
        if (isset($build['id']) && $build['id'] == $id) {
            $existe = true;
            $json[$key] = array_merge($build, $data);
            echo json_encode($json[$key]);
            break;
        }
    }

    if (!$existe) {
        Codigos::notFound();
        echo json_encode(["error" => "No se encontró la entrada con el ID proporcionado"]);
        return;
    }

    file_put_contents('../app/models/builds.json', json_encode($json, JSON_PRETTY_PRINT));

    Codigos::created();
    header('Content-Type: application/json');
}


function deleteBuild($id) {
    $jsonContent = file_get_contents('../app/models/builds.json');
    $json = json_decode($jsonContent, true);

    $existe = null;
    foreach ($json as $key => $build) {
        if (isset($build['id']) && $build['id'] == $id) {
            $existe = $key;
            break;
        }
    }

    if ($existe === null) {
        echo Codigos::notFound();
        echo json_encode(["error" => "No se ha encontrado la entrada con el ID proporcionado"]);
        return;
    }

    unset($json[$existe]);

    $json = array_values($json);

    file_put_contents('../app/models/builds.json', json_encode($json, JSON_PRETTY_PRINT));

    echo Codigos::success();
    header('Content-Type: application/json');
    echo "Se ha eliminado el ID ".$id;
}


}

?>