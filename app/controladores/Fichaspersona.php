<?php 

class Fichaspersona{

    public function get(){
$datos = new Fichapersona;



if(isset($_POST)){ 
    $nombres= $_POST['nombres'];
   $data= $datos->listarNombre($nombres);
    echo $data;
}else{
    $data=null;
}


echo json_encode($data);
    }
}

?>