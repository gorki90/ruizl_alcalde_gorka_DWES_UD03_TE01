<?php


class Build{
function __construct(){

}



function seeBuilds(){
$buildDAO=new BuildDAO();
$builds=$buildDAO->getAllBuilds();
if($builds){
    echo Codigos::success();
    echo "Builds cargadas correctamente";
    echo json_encode($builds, JSON_PRETTY_PRINT);
}else{
    echo Codigos::notFound();
    echo "No hay ninguna Build";
}

}

function seeBuildsbyid($id){
    $buildDAO=new BuildDAO();
    $builds=$buildDAO->getBuildById($id);
    echo json_encode($builds, JSON_PRETTY_PRINT);

    if(!$builds){
        echo Codigos::notFound();
        echo "El id no existe";
    }
}

function seeBuildsbyAutorId($id){
$buildDAO=new BuildDAO();
$builds=$buildDAO->getBuildByAutorId($id);

if (!empty($builds)) {
    echo Codigos::success();
    echo "Builds cargadas correctamente";
    echo json_encode($builds, JSON_PRETTY_PRINT);
} else {
    echo Codigos::notFound();
    echo " No se encontraron builds para este autor";
}
}


function createBuild(){
    $buildDAO = new BuildDAO();
    $success = $buildDAO->createBuildDAO();
    echo $success;
}


function updateBuild($id){
    
    $buildDAO = new BuildDAO();
    $success = $buildDAO->updateBuildDAO($id);
    echo $success;
}


function deleteBuild($id){
    
    $buildDAO = new BuildDAO();
    $success = $buildDAO->deleteBuildDAO($id);
    echo $success;
}


}

?>