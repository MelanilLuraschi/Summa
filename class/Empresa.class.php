<?php
include_once 'Conect.php';
class Empresa extends Conect
{
    private $id;
    private $nombre;
    private $empleados;
    public function __construct(int $id = 1, string $nombre = "melani", string $empleados = "Programador")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->empleados = $empleados;
        $objeto = new Conect();
        $this->conexion = $objeto->Conexion();
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEmpleados($empleados)
    {
        $this->empleados = $empleados;
    }
    //---------------------------    SEARCH BY ID     -----------------------------
    public function searchById()
    {

        $consulta = "SELECT *FROM empresa WHERE id=$this->id";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($usuarios)){
?>
        
        <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
            <h1>Empleado buscado:</h1>
            <thead class="text-center">
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Tipo</th>
                <th>Tecnología</th>
            </thead>
            <?php
            foreach ($usuarios as $usuario) {
            ?>

                <tr>
                    <td><?php echo $usuario['id'] ?></td>
                    <td><?php echo $usuario['nombre'] ?></td>
                    <td><?php echo $usuario['apellido'] ?></td>
                    <td><?php echo $usuario['edad'] ?></td>
                    <td><?php echo $usuario['tipo'] ?></td>
                    <td><?php echo $usuario['lenguaje'] ?></td>
                    <td><?php echo $usuario['tipodisenador'] ?></td>

                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    }else{echo "El id ingresado no existe";}}
    //---------------------------    SEARCH BY NAME      -----------------------------
    public function searchByName()
    {
        $consulta = "SELECT *FROM empresa WHERE nombre=('$this->nombre')";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($usuarios)){
    ?>
        <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
            <h1>Empleado buscado:</h1>
            <thead class="text-center">
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Tipo</th>
                <th>Tecnología</th>
            </thead>
            <?php
            foreach ($usuarios as $usuario) {
            ?>
                <tr>
                    <td><?php echo $usuario['id'] ?></td>
                    <td><?php echo $usuario['nombre'] ?></td>
                    <td><?php echo $usuario['apellido'] ?></td>
                    <td><?php echo $usuario['edad'] ?></td>
                    <td><?php echo $usuario['tipo'] ?></td>
                    <td><?php echo $usuario['lenguaje'] ?></td>
                    <td><?php echo $usuario['tipodisenador'] ?></td>

                </tr>
            <?php
            }
            ?>
        </table>
        <?php
    }else{echo "El Nombre ingresado no existe";}}
    //---------------------------    AGE AVERAGE     -----------------------------
    public function ageAverage()
    {
        $consulta = "SELECT AVG(edad) as Promedio FROM `empresa`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($usuarios as $usuario) {
        ?>
            <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <h1>Promedio de edades:</h1>
                <thead class="text-center">
                    <th>Promedio</th>
                </thead>
                <tr>
                    <td><?php echo round($usuario['Promedio']) . " años" ?></td>
                </tr>
            <?php
        }
            ?>
            </table>
        <?php
    }
    //---------------------------    ALL EMPLOYEE TYPE    -----------------------------
    public function allEmployeeType()
    {
        $consulta = "SELECT * FROM empresa WHERE tipo=('$this->empleados')";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>
            
                <?php if($this->empleados=="Disenador"){
                    
                    ?>
                <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <h1>Registro total de <?php echo $this->empleados . "es:" ?> </h1>
                <thead class="text-center">
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Area</th>
                    <th>Tipo de Diseñador</th>
                </thead>
                <?php
                foreach ($usuarios as $usuario) {
                ?>
                    <tr class="text-center">
                        <td><?php echo $usuario['id'] ?></td>
                        <td><?php echo $usuario['nombre'] ?></td>
                        <td><?php echo $usuario['apellido'] ?></td>
                        <td><?php echo $usuario['edad'] ?></td>
                        <td><?php echo $usuario['tipo'] ?></td>
                        <td><?php echo $usuario['tipodisenador'] ?></td>

                    </tr> <?php
            }
            ?>
                </table>
                <?php
                
                }else{?>
                <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <h1>Registro total de <?php echo $this->empleados . "es:"; ?> </h1>
                    <thead class="text-center">
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>Area</th>
                        <th>Lenguaje</th>
                    </thead>
                    <?php
                    foreach ($usuarios as $usuario) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $usuario['id'] ?></td>
                            <td><?php echo $usuario['nombre'] ?></td>
                            <td><?php echo $usuario['apellido'] ?></td>
                            <td><?php echo $usuario['edad'] ?></td>
                            <td><?php echo $usuario['tipo'] ?></td>
                            <td><?php echo $usuario['lenguaje'] ?></td>
    
                        </tr>
                        <?php
            }
            ?>
                        </table>   
                        <?php
                        }
                    }
                        
                       
                       
        
    

    //---------------------------   ALL EMPLOYEE     -----------------------------
    public function allEmployee()
    {
        $consulta = "SELECT * FROM empresa";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <h1>Registro total de empleados:</h1>
                <thead class="text-center">
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Tipo</th>
                    <th>Lenguaje</th>
                    <th>Tipo de Diseñador</th>
                </thead>
                <?php
                foreach ($usuarios as $usuario) {
                ?>
                    <tr>
                        <td><?php echo $usuario['id'] ?></td>
                        <td><?php echo $usuario['nombre'] ?></td>
                        <td><?php echo $usuario['apellido'] ?></td>
                        <td><?php echo $usuario['edad'] ?></td>
                        <td><?php echo $usuario['tipo'] ?></td>
                        <td><?php echo $usuario['lenguaje'] ?></td>
                        <td><?php echo $usuario['tipodisenador'] ?></td>

                    </tr>
                <?php
         
                }
                ?>    
            </table>
    <?php
    }
}
// ------EJEMPLOS DE INSTANCIACION, EN EL INDEX SE PUEDEN VER TODOS LOS EJEMPLOS CORRECTAMENTE-----
// $empleado1 = new Empresa(107,"Patricio","Programador");
// $empleado1->searchById();
// $empleado1-> searchByName();
// $empleado1->ageAverage();
// $empleado1->allEmployeeType();
// $empleado1->allEmployee();