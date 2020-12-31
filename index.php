<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <title>Administrador de empleados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href=""><img src="images/img1.png" class="logo2" alt="Logo Go Adiestramiento"></a>
        </div>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">
            <li><a href="#formId">BUSCAR EMPLEADO </a></li>
            <li><a href="#formadd">AGREGAR EMPLEADO</a></li>
        </ul>
    </header>
    <h1 class="text-center">Administrador de empleados</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                include_once 'class/Empresa.class.php';
                $Empresa = new Empresa(); //INSTANCIACIÓN DE LA CLASE EMPRESAS
                $Empresa->allEmployee(); //DEVUELVE EL REGISTRO TOTAL DE LOS EMPLEADOS
                $Empresa->ageAverage(); //DEVUELVE EL PROMEDIO DE EDADES DE LOS EMPLEADOS
                ?>
                <!---------------------------    SEARCH BY ID     ------------------------------------>
                <hr>
                <div class="form" id="formId">
                    <h1>Buscar empleado por:</h1>
                    <form method="get">
                        <h5>Id</h5>
                        <div class="form-group">
                            <input type="number" class="form-control" name="id" placeholder="Ingrese el Id">
                        </div>
                        <button type="submit" class="btn btn-primary" style=" background-color:#FF6938 ">Submit</button>

                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            if (!empty($id)) {
                                $Empresa->setId($id);
                                $Empresa->searchById(); //DEVUELVE EL EMPLEADO BUSCADO POR ID O UNA ADVERTENCIA EN CASO DE NO ENCONTRAR DICHO ID
                            } else {
                                echo "<p style=color:red>El campo id no está completo</p> <hr>";
                            }
                        }
                        ?>
                    </form>
                </div>
                <!---------------------------    SEARCH BY NAME    ------------------------------------>
                <div class="form">
                    <form method="get">
                        <h5>Nombre</h5>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre">
                        </div>
                        <button type="submit" class="btn btn-primary" style=" background-color:#FF6938 ">Submit</button>
                        <?php
                        if (isset($_GET['nombre'])) {
                            $nombre = $_GET['nombre'];
                            if (!empty($nombre)) {
                                $Empresa->setNombre($nombre);
                                $Empresa->searchByName(); //DEVUELVE EL EMPLEADO BUSCADO POR NOMBRE O UNA ADVERTENCIA EN CASO DE NO ENCONTRAR DICHO NOMBRE
                            } else {
                                echo "<p style=color:red>El campo nombre no está completo</p> <hr>";
                            }
                        }
                        ?>
                    </form>
                </div>
                <!---------------------------    SEARCH BY TYPE    ----------------------------------------->
                <div class="form">
                    <form method="get">
                        <h5>Buscar todos los empleados por tipo: Pogramador/Diseñador</h5>
                        <select name="tipoST" class="form-control">
                            <option disabled selec>Selecciona una opción</option>
                            <option value="Programador">Programador</option>
                            <option value="Disenador">Diseñador</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary" style=" background-color:#FF6938 ">Submit</button>
                        <?php
                        if (isset($_GET['tipoST'])) {
                            $empleados = $_GET['tipoST'];
                            if (!empty($empleados)) {
                                $Empresa->setEmpleados($empleados);
                                $Empresa->allEmployeeType(); //DEVUELVE EL EMPLEADO BUSCADO POR TIPO (PROGRAMADOR O DISEÑADOR) O UNA ADVERTENCIA EN CASO DE NO ELEGIR UNA OPCIÓN
                            } else {
                                echo "<p style=color:red>Debe seleccionar una opcion</p> <hr>";
                            }
                        }
                        ?>
                    </form>
                </div>
                <!---------------------------    ADD DISEÑADOR/PROGRAMADOR    ----------------------------->
                <?php
                include_once 'class/Diseñador.class.php';
                include_once 'class/Programador.class.php';
                ?>
                <div class="formadd" id="formadd" style="margin-bottom:5%;">
                    <h1>Agregar Empleado</h1>
                    <form method="get" class="form">
                        <select name="tipo" class="form-control">
                            <option disabled selected>Seleccione una opcion</option>
                            <option value="Programador">Programador</option>
                            <option value="Diseñador">Diseñador</option>
                        </select>
                        <button type="submit" class="btn btn-primary" style=" background-color:#FF6938 ">Submit</button>
                        <?php if (isset($_GET['tipo'])) {
                            $tipoPD = $_GET['tipo'];
                            if ($tipoPD == "Diseñador") {
                        ?> <form method="get" class="form-group">
                                    <input type="hidden" class="form-control" name="tipo" value="Diseñador">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="nombreD" required placeholder="Ingrese el nombre">
                                    <label>Apellido de empleado</label>
                                    <input type="text" class="form-control" name="apellidoD" required placeholder="Ingrese el apellido">
                                    <label>Edad de empleado</label>
                                    <input type="number" class="form-control" name="edadD" required placeholder="Ingrese la edad">
                                    <label>Lenguajes</label>
                                    <select name="tipodisenador" class="form-control">
                                        <option value="Web">Web</option>
                                        <option value="Grafico">Grafico</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" style=" background-color:#FF6938 ">Submit</button>
                                </form>
                                <?php
                                if (isset($_GET['nombreD'], $_GET['apellidoD'], $_GET['edadD'], $_GET['tipodisenador'])) {
                                    $nombreD = $_GET['nombreD'];
                                    $apellidoD = $_GET['apellidoD'];
                                    $edadD = $_GET['edadD'];
                                    $tipodisenador = $_GET['tipodisenador'];
                                    $Empresa1 = new Disenador($nombreD, $apellidoD, $edadD, $tipodisenador);
                                    $Empresa1->insertUser();
                                }
                            } elseif ($tipoPD == "Programador") {
                                ?>
                                <form method="get" class="form-group">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="tipo" value="Programador">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" required name="nombre" placeholder="Ingrese el nombre">
                                        <label>Apellido de empleado</label>
                                        <input type="text" class="form-control" required name="apellido" placeholder="Ingrese el apellido">
                                        <label>Edad de empleado</label>
                                        <input type="number" class="form-control" required name="edad" placeholder="Ingrese el edad">
                                        <label>Lenguajes</label>
                                        <select name="lenguaje" class="form-control">
                                            <option value="PHP">PHP</option>
                                            <option value="NET">NET</option>
                                            <option value="Python">Python</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style=" background-color:#FF6938 ">Submit</button>
                                </form>
                        <?php
                                if (isset($_GET['nombre'], $_GET['apellido'], $_GET['edad'], $_GET['lenguaje'])) {
                                    $nombre = $_GET['nombre'];
                                    $apellido = $_GET['apellido'];
                                    $edad = $_GET['edad'];
                                    $lenguaje = $_GET['lenguaje'];
                                    $addEmpleado = new Programador($nombre, $apellido, $edad, $tipoPD, $lenguaje);
                                    $addEmpleado->insertUser();
                                }
                            }
                        } ?></form>
                </div>
            </div>
        </div>
    </div>
</body>