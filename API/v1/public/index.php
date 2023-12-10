<?php
require "../core/router.php";
require "../app/controllers/Post.php";

$router=new Router();

$router->add('/public/post/getSkills', array(
    'controller'=>'Post',
    'action'=>'getAllSkillTrees'
));

$router->add('/public/post/getSkills/{id}', array(
    'controller'=>'Post',
    'action'=>'getSkillTreeById'
));

$router->add('/public/post/createBuild', array(
    'controller'=>'Post',
    'action'=>'createBuild'
));

$router->add('/public/post/updateBuild/{id}', array(
    'controller'=>'Post',
    'action'=>'updateBuild'
));

$router->add('/public/post/deleteBuild/{id}', array(
    'controller'=>'Post',
    'action'=>'deleteBuild'
));

$url= $_SERVER["QUERY_STRING"];
echo "URL =".$url. "<br>";

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

echo '<pre>';
print_r($urlArray).'<br>';
echo '</pre>';



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
        echo "El método no existe.";
    }
} else {
    echo "Ruta no encontrada.";
}
?>
