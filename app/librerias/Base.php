<?php 
class Base{
private $host=DB_HOST;
private $usuario= DB_USUARIO ;    
private $password= DB_PASSWORD;
private $nombre_base= DB_NOMBRE ;
private $dbh;
private $stmt;
private $error;




    public function __construct() {
$dsn='mysql:host='.$this->host.';dbname='. $this->nombre_base ;
$opciones=array(PDO::ATTR_PERSISTENT=>true,
PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION


);
// crear instancias pdo
try {
$this->dbh=new PDO($dsn,$this->usuario,$this->password,$opciones);
    $this->dbh->exec('set names utf8');
} catch (PDOException $e) {
    $this->error=$e->getMessage();
    echo $this->error;
    //throw $th;
}

    }
    //preparamos la consulta
    public function query($sql){

        $this->stmt=$this->dbh->prepare($sql);
    }
    //vincula la consulta con bind
    public function bind($parametro,$valor,$tipo=null){
        if(is_null($tipo)){
            switch(true){
case is_int($valor):
    $tipo=PDO::PARAM_INT;
break;
case  is_bool($valor):
    $tipo=PDO::PARAM_BOOL;
break;
case is_null($valor):
    $tipo=PDO::PARAM_NULL;
break;                
default:
$tipo=PDO::PARAM_STR;

break;           



            }
        }
      $this->stmt->bindValue($parametro,$valor,$tipo);
    }
    //ejecuta la consulta
    public function execute(){
        return $this->stmt->execute();
    }
    //obtener registro
    public function registros(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);

    }
    //optener un solo registro
    public function registro(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);

    }
    //optener cantidad de filas con el emtodo rowCount 
    public function rowCount(){
        return $this->stmt->rowCount();

    }
}
?>