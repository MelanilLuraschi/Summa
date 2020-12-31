<?php
include_once 'Conect.php';
class Programador extends Conect{ 
    private $nombre;
    private $apellido;
    private $edad;
    private $lenguaje;
    private $tipo;
    public function __construct(string $nombre, string $apellido, int $edad, string $tipo, string $lenguaje)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->edad=$edad;
        $this->tipo=$tipo;
        $this->lenguaje=$lenguaje;
        $objeto = new Conect();
        $this->conexion = $objeto->Conexion();
    }
// ---------------------------    INSERT EMPLOYEE     -----------------------------
    public function insertUser( ){
        $sql="INSERT INTO empresa(nombre,apellido,edad,tipo,lenguaje) VALUES(?,?,?,?,?)";
        $insert=$this->conexion->prepare($sql);
        $arrData=array($this->nombre,$this->apellido,$this->edad,$this->tipo,$this->lenguaje);
        $insert->execute($arrData);
        $idInsert=$this->conexion->lastInsertId();
        //Para ver el ejemplo de instanciancion descomentar el siguiente var_dump
        //var_dump($arrData);
        return $idInsert;
    }
}
// ------EJEMPLOS DE INSTANCIACION, EN EL INDEX SE PUEDEN VER TODOS LOS EJEMPLOS CORRECTAMENTE-----
// $addEmpleado = new Programador("Melani", "Luraschi", 26, "Programador", "PHP");
// $addEmpleado->insertUser();

