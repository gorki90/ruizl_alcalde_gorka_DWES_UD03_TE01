
Class Router{

Protected $routes=array();

Public function add($route, $param){

$this->routes[$route]=$params;

};

Public function getRoutes(){

Return $this->routes;

};
};

$router=new Router()

$router->add(“/public”, array(
“controller”=>”Home”,
“action”=>”index”
));
