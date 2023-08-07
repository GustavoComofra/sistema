<?php 
class ApptivaDB{    
    private $host   ="198.27.76.221";
    private $usuario="comofras_sistema";
    private $clave  ="Comofra05!";
    private $db     ="comofras_bdinterno";

    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db)
        or die(mysql_error());
        $this->conexion->set_charset("utf8");
        echo "prueba";
    }
  
    //BUSCAR
    public function buscar($tabla, $condicion){
        $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
        if($resultado)
            return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    } 
}

?>