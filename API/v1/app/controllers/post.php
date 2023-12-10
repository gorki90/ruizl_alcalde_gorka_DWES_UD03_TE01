<?php
class Post{
function __construct(){

}

function getAllSkillTrees(){
    $jsonContent = file_get_contents('../app/models/skillTrees.json');
    $json= json_decode($jsonContent,true);
    $datos= $json['data'];

    $id = array();
    $name = array();
    $description=array();

    foreach ($datos as $skillTree) {
        $id[] = $skillTree['id'];
        $name[] = $skillTree['name'];
        $description[] = $skillTree['description'];
    };
  
    $count = count($id);
    ?>
    
            <table>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
    
                <?php
                for ($i = 0; $i < $count; $i++) {
                ?>
                    <tr>
                        <td><?php echo $id[$i] ?></td>
                        <td><?php echo $name[$i] ?></td>
                        <td><?php echo $description[$i] ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
    <?php
}

function getSkillTreeById($id){
    $jsonContent = file_get_contents('../app/models/skillTrees.json');
    $json= json_decode($jsonContent,true);
    $datos= $json['data'];
    $idExists=false;
    ?>
    
            <table>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
    
               
                <?php
        foreach ($datos as $skillTree) {
            if ($skillTree['id'] == $id) {
                $idExists=true;
        ?>
                <tr>
                    <td><?php echo $skillTree['id'] ?></td>
                    <td><?php echo $skillTree['name'] ?></td>
                    <td><?php echo $skillTree['description'] ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
    <?php
    if (!$idExists) {
        echo "El id " . $id . " no existe.";
    }
    ?>
<?php
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