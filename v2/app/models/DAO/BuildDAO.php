<?php

require "../core/Database.php";
require_once "../app/models/DTO/BuildDTO.php";


class BuildDAO{

private $db;

public function __construct(){
    $this->db = Database::getInstance();
}

public function getAllBuilds(){

$connection=$this->db->getConnection();
$query="SELECT * FROM build";
$statement=$connection->query($query);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
return $result;

}

public function getBuildById($id){

    $connection=$this->db->getConnection();
    $query="SELECT * FROM build WHERE id_build=$id";
    $statement=$connection->query($query);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
   
    
    return $result;
    
    }


public function getBuildByAutorId($id){

        $connection=$this->db->getConnection();
        $query="SELECT build.*, autor.username_autor
        FROM build 
        JOIN autor ON build.autor_id=autor.autor_id
        WHERE autor.autor_id=$id";
        $statement=$connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        

        $buildDTOArray = array();
    
    foreach($result as $fila) {
        $buildDTO = new BuildDTO($fila["nombre_build"], $fila["username_autor"]);
        $buildDTOArray[] = $buildDTO; 
    }
    
    return $buildDTOArray;
}


public function createBuildDAO() {
    $connection = $this->db->getConnection();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
        $skills = isset($_POST["skills"]) ? $_POST["skills"] : "";
        $abilities = isset($_POST["abilities"]) ? $_POST["abilities"] : "";
        $head = isset($_POST["head"]) ? $_POST["head"] : "";
        $chest = isset($_POST["chest"]) ? $_POST["chest"] : "";
        $foot = isset($_POST["foot"]) ? $_POST["foot"] : "";
        $weapon1 = isset($_POST["weapon1"]) ? $_POST["weapon1"] : "";
        $weapon2 = isset($_POST["weapon2"]) ? $_POST["weapon2"] : "";
        $tent = isset($_POST["tent"]) ? $_POST["tent"] : "";
        $autor = isset($_POST["autor"]) ? $_POST["autor"] : 2;
        $backpack = isset($_POST["backpack"]) ? $_POST["backpack"] : "";
        
        
        $query = "INSERT INTO build
            (nombre_build, descripcion_build, skill_trees, abilities, equipment_head, equipment_chest, equipment_foot, 
            equipment_weapon1, equipment_weapon2, equipment_tent, autor_id, equipment_backpack) 
            VALUES ('$nombre', '$descripcion', '$skills', '$abilities', '$head', '$chest', '$foot', 
            '$weapon1', '$weapon2', '$tent', '$autor', '$backpack')";

        $success = $connection->exec($query);

        return "Build Creada ".Codigos::created();
    } else {
        
        ?>
        <form method="POST" action="">
            <label for="nombre">Nombre de la build:</label><br>
            <input type="text" id="nombre" name="nombre" required><br>
            
            <label for="descripcion">Descripción de la build:</label><br>
            <textarea id="descripcion" name="descripcion" required></textarea><br>
            
            <label for="skills">Árboles de habilidades:</label><br>
            <input type="text" id="skills" name="skills"><br>
            
            <label for="abilities">Habilidades:</label><br>
            <input type="text" id="abilities" name="abilities"><br>
            
            <label for="head">Equipamiento cabeza:</label><br>
            <input type="text" id="head" name="head"><br>
            
            <label for="chest">Equipamiento pecho:</label><br>
            <input type="text" id="chest" name="chest"><br>
            
            <label for="foot">Equipamiento pie:</label><br>
            <input type="text" id="foot" name="foot"><br>
            
            <label for="weapon1">Arma 1:</label><br>
            <input type="text" id="weapon1" name="weapon1"><br>
            
            <label for="weapon2">Arma 2:</label><br>
            <input type="text" id="weapon2" name="weapon2"><br>
            
            <label for="tent">Tent:</label><br>
            <input type="text" id="tent" name="tent"><br>
            
            <label for="autor">ID del autor:</label><br>
            <input type="number" id="autor" name="autor" required><br>
            
            <label for="backpack">Mochila:</label><br>
            <input type="text" id="backpack" name="backpack"><br>
            
            <button type="submit">Enviar</button>
        </form>
        <?php
    }
}

public function updateBuildDAO($id) {
    $connection = $this->db->getConnection();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = isset($_POST["id_build"]);
        $query = "SELECT * FROM build WHERE id_build = $id";
        $statement=$connection->query($query);
        $build = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$build) {
            echo "No se encontró la build con ID $id";
            return false;
        }

        $id= isset($_POST["id_build"]) && $_POST["id_build"] !== "" ? $_POST["id_build"] : $build['id_build'];
        $nombre = isset($_POST["nombre"]) && $_POST["nombre"] !== "" ? $_POST["nombre"] : $build['nombre_build'];
        $descripcion = isset($_POST["descripcion"]) && $_POST["descripcion"] !== "" ? $_POST["descripcion"] : $build['descripcion_build'];
        $skills = isset($_POST["skills"]) && $_POST["skills"] !== "" ? $_POST["skills"] : $build['skill_trees'];
        $abilities = isset($_POST["abilities"]) && $_POST["abilities"] !== "" ? $_POST["abilities"] : $build['abilities'];
        $head = isset($_POST["head"]) && $_POST["head"] !== "" ? $_POST["head"] : $build['equipment_head'];
        $chest = isset($_POST["chest"]) && $_POST["chest"] !== "" ? $_POST["chest"] : $build['equipment_chest'];
        $foot = isset($_POST["foot"]) && $_POST["foot"] !== "" ? $_POST["foot"] : $build['equipment_foot'];
        $weapon1 = isset($_POST["weapon1"]) && $_POST["weapon1"] !== "" ? $_POST["weapon1"] : $build['equipment_weapon1'];
        $weapon2 = isset($_POST["weapon2"]) && $_POST["weapon2"] !== "" ? $_POST["weapon2"] : $build['equipment_weapon2'];
        $tent = isset($_POST["tent"]) && $_POST["tent"] !== "" ? $_POST["tent"] : $build['equipment_tent'];
        $autor = isset($_POST["autor"]) && $_POST["autor"] !== "" ? $_POST["autor"] : $build['autor_id'];
        $backpack = isset($_POST["backpack"]) && $_POST["backpack"] !== "" ? $_POST["backpack"] : $build['equipment_backpack'];
        
        // Actualizar la build en la base de datos
        $query = "UPDATE build SET
            nombre_build = '$nombre',
            descripcion_build = '$descripcion',
            skill_trees = '$skills',
            abilities = '$abilities',
            equipment_head = '$head',
            equipment_chest = '$chest',
            equipment_foot = '$foot',
            equipment_weapon1 = '$weapon1',
            equipment_weapon2 = '$weapon2',
            equipment_tent = '$tent',
            autor_id = '$autor',
            equipment_backpack = '$backpack'
            WHERE id_build = $id";

        $success = $connection->exec($query);

        return "Build modificada ".Codigos::success();
    } else {
       
        $query = "SELECT * FROM build WHERE id_build = $id";
        $stmt = $connection->query($query);
        $build = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$build) {
            echo "No se encontró la build con ID $id";
            return false;
        }

       
        ?>
        <h2>Actualiza tu Build</h2>
        <form method="POST" action="">

            <input type="number" name="id_build" value="<?php echo $build['id_build'];?>">

            <label for="nombre">Nombre de la build:</label><br>
            <input type="text" id="nombre" name="nombre" value="<?php echo $build['nombre_build'];?>"><br>
            
            <label for="descripcion">Descripción de la build:</label><br>
            <textarea id="descripcion" name="descripcion" value="<?php echo $build['descripcion_build'];?>"></textarea><br>
            
            <label for="skills">Árboles de habilidades:</label><br>
            <input type="text" id="skills" name="skills" value="<?php echo $build['skill_trees'];?>"><br>
            
            <label for="abilities">Habilidades:</label><br>
            <input type="text" id="abilities" name="abilities" value="<?php echo $build['abilities'];?>"><br>
            
            <label for="head">Equipamiento cabeza:</label><br>
            <input type="text" id="head" name="head" value="<?php echo $build['equipment_head'];?>"><br>
            
            <label for="chest">Equipamiento pecho:</label><br>
            <input type="text" id="chest" name="chest" value="<?php echo $build['equipment_chest'];?>"><br>
            
            <label for="foot">Equipamiento pie:</label><br>
            <input type="text" id="foot" name="foot" value="<?php echo $build['equipment_foot'];?>"><br>
            
            <label for="weapon1">Arma 1:</label><br>
            <input type="text" id="weapon1" name="weapon1" value="<?php echo $build['equipment_weapon1'];?>"><br>
            
            <label for="weapon2">Arma 2:</label><br>
            <input type="text" id="weapon2" name="weapon2" value="<?php echo $build['equipment_weapon2'];?>"><br>
            
            <label for="tent">Tent:</label><br>
            <input type="text" id="tent" name="tent" value="<?php echo $build['equipment_tent'];?>"><br>
            
            <label for="autor">ID del autor:</label><br>
            <input type="number" id="autor" name="autor" value="<?php echo $build['autor_id'];?>"><br>
            
            <label for="backpack">Mochila:</label><br>
            <input type="text" id="backpack" name="backpack" value="<?php echo $build['equipment_backpack'];?>"><br>
            

            <button type="submit">Actualizar</button>
        </form>
        <?php
    }
}

public function deleteBuildDAO($id) {
    $connection = $this->db->getConnection();
        $query = "DELETE FROM build WHERE id_build = $id";
        $success = $connection->exec($query);

        return "Build eliminada ".Codigos::success();
}

}

?>