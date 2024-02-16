<?php
require "../core/router.php";
require "../app/controllers/info.php";
require "../app/controllers/Build.php";
require "../app/models/DAO/BuildDAO.php";


$router=new Router();

$router->add('/public/info/getskills', array(
    'controller'=>'Info',
    'action'=>'getAllSkillTrees'
));

$router->add('/public/info/getskills/{id}', array(
    'controller'=>'Info',
    'action'=>'getSkillTreeById'
));

$router->add('/public/build/builds', array(
    'controller'=>'Build',
    'action'=>'seeBuilds'
));

$router->add('/public/build/builds/{id}', array(
    'controller'=>'Build',
    'action'=>'seeBuildsbyid'
));

$router->add('/public/build/autor/{id}', array(
    'controller'=>'Build',
    'action'=>'seeBuildsbyAutorId'
));

$router->add('/public/build/createbuild', array(
    'controller'=>'Build',
    'action'=>'createBuild'
));

$router->add('/public/build/updatebuild/{id}', array(
    'controller'=>'Build',
    'action'=>'updateBuild'
));

$router->add('/public/build/deletebuild/{id}', array(
    'controller'=>'Build',
    'action'=>'deleteBuild'
));

$url= $_SERVER["QUERY_STRING"];

$urlParams=explode('/',$url);

$urlArray=array(
'HTTP'=>$_SERVER['REQUEST_METHOD'],
'path'=>$url,
'controller'=>'',
'action'=>'',
'params'=>''
);

if(!empty($urlParams[2])){
$urlArray['controller']=ucwords($urlParams[2]);
if(!empty($urlParams[3])){
$urlArray['action']=$urlParams[3];
if(!empty($urlParams[4])){
$urlArray['params']=$urlParams[4];
}
}else{
    $urlArray['action']='index';
}
}else{
    $urlArray['controller']='Home';
    $urlArray['action']='index';
}




if ($router->match($urlArray)) {
    $method = $_SERVER['REQUEST_METHOD'];

    $param = [];

    if ($method === 'GET') {
        $param[] = intval($urlArray['params']) ?? null;
    } elseif ($method === 'POST') {
        $json = file_get_contents('php://input');
        $param[] = json_decode($json, true);
    } elseif ($method === 'PUT') {
        $id = intval($urlArray['params']) ?? null;
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $param = [$id, $data];
    } elseif ($method === 'DELETE') {
        $param[] = intval($urlArray['params']) ?? null;
    }

    $controller = $router->getParams()['controller'];
    $action = $router->getParams()['action'];
    $controllerInstance = new $controller();

    if (method_exists($controllerInstance, $action)) {
        $res = call_user_func_array([$controllerInstance, $action], $param);
    } else {
        echo Codigos::badRequest();
    }
} else {
    echo Codigos::notFound();
}


?>