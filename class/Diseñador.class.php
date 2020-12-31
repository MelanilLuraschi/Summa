<?php
include_once 'Conect.php';
class Disenador extends Conect{ 
    private $nombre;
    private $apellido;
    private $edad;
    private $tipodisenador;
    private $tipo="Diseñador";
    public function __construct(string $nombre, string $apellido, int $edad, string $tipodisenador)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->edad=$edad;
        $this->tipodisenador=$tipodisenador;
        $objeto = new Conect();
        $this->conexion = $objeto->Conexion();    
    }
// ---------------------------    INSERT EMPLOYEE     -----------------------------
    public function insertUser(){
        $sql="INSERT INTO empresa(nombre,apellido,edad,tipo,tipodisenador) VALUES(?,?,?,?,?)";
        $insert=$this->conexion->prepare($sql);
        $arrData=array($this->nombre,$this->apellido,$this->edad,$this->tipo,$this->tipodisenador);
        $insert->execute($arrData);
        $idInsert=$this->conexion->lastInsertId();
        //Para ver el ejemplo de instanciancion descomentar el siguiente var_dump
        // var_dump($arrData);
        return $idInsert;
    }
}
// ------EJEMPLOS DE INSTANCIACION, EN EL INDEX SE PUEDEN VER TODOS LOS EJEMPLOS CORRECTAMENTE-----
// $addEmpleado1 = new Disenador("Melani", "Luraschi", 26,"Web"); 
// $addEmpleado1->insertUser();  


