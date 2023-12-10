<?php
require "../core/router.php";
require "../app/controllers/post.php";

$router=new Router();

$router->add('/public', array(
    'controller'=>'Home',
    'action'=>'index'
));

$router->add('/public/post/new', array(
    'controller'=>'Post',
    'action'=>'new'
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

if($router->match($urlArray)){
$controller=$router->getParams()['controller'];
$action=$router->getParams()['action'];
$controller=new $controller();
$controller->$action();

}else{
   echo "Route not found ".$url; 
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        
    

        <script src="" async defer></script>
    </body>
</html>