<?php
namespace Datos;
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$nacimiento = $_GET["born"];
$tipodni = $_GET["dni"];
$numerodni = $_GET["n"];
$genero= $_GET["genero"];
$tlf = $_GET["telefono"];
$numero = $_GET["numero"];
 

$Empresa = $_GET["ne"];
$fi = $_GET["fecha"];
$fs = $_GET["salida"];
$cargo = $_GET["cargo"];
$des = $_GET["descripcion"];

$institucion = $_GET["institucion"];
$ingreso = $_GET["ingreso"];
$egreso = $_GET["egreso"];
$nivel =$_GET["nivel"];

echo "<h3> Datos recibidos </h3>"; 
echo "<h5> Nombre y apellido </h5>";
echo "$nombre";
echo "";
echo "$apellido";

echo "<h5> Documento de identidad </h5>";
echo "$tipodni";
echo " ";
echo "$numerodni";

$dia_actual = date('d');
$mes_actual = date('m');
$years_actual = date('Y');

$edad = $years_actual - $nacimiento;

echo "<h5> Fecha de nacimiento</h5>";
echo "<h6> Dia $nacimiento </h6>";
echo "<h6> Mes $nacimiento </h6>";
echo "<h5> Edad </h5>";
echo "$edad";

echo "<h5> Genero </h5>";
 
if($_REQUEST['genero'] == "masculino"){
    echo $_REQUEST['genero'];
    }

if($_REQUEST['genero'] == "femenino"){
    echo $_REQUEST['genero'];
    }

if($_REQUEST['genero'] == "nobi"){
    echo $_REQUEST['genero'];
    }

if($_REQUEST['genero'] == "node"){
    echo $_REQUEST['genero'];
    }

echo "<h5> telefono </h5>";
echo  "$tlf";
echo "";
echo "$numero";
$file = file_get_contents('persona.json');
$file = json_decode($file);

$registro = [
    'nombre' => $_GET['nombre'].' '.$_GET['apellido'],
    'dni' => $_GET['dni'].' '.$_GET['n'],
    'fecha_nacimiento' => $_GET['born'],
    'genero' => $_GET['genero'],
    'telefono' => [
        'tipo' => $_GET['telefono'],
        'numero' => $_GET['numero'],
    ],
];
$file[] = $registro;

$file = json_encode($file);

file_put_contents('persona.json',$file);
?>

<?php
echo "<h3> Curriculum </h3>";

echo "$Empresa";

echo "<h5> Fecha de inicio</h5>";

echo "$fi";

echo "<h5> Fecha de salida </h5>";
echo "$fs";

echo "<h5> Puesto ocupado </h5>";
echo "$cargo";

echo "<h5> Descripcion </h5>";
echo "$des";

$file = file_get_contents('experiencia.json');
$file = json_decode($file);

$registro = [
    'nombreempresa' => $_GET['ne'],
    'fecha de inicio' => $_GET['fecha'],
    'fecha de salida' => $_GET['salida'],
    'puesto ocupado' => $_GET['cargo'],
    'descripcion' => $_GET['descripcion'],
        
];
$file[] = $registro;

$file = json_encode($file);

file_put_contents('experiencia.json',$file);
?>

<?php
echo "<h3> Educacion</h3>";

echo "<h5> Institucion </h5>"; 
echo "$institucion";

echo "<h5> Fecha de ingreso </h5>";
echo "$ingreso";

echo "<h5> Fecha de egreso </h5>";
echo "$egreso";

echo "<h5> Nivel educativo </h5>";
echo "$nivel";

$file = file_get_contents('educacion.json');
$file = json_decode($file);

$registro = [
    'Institucion' => $_GET['institucion'],
    'fecha de ingreso' => $_GET['ingreso'],
    'fecha de egreso' => $_GET['egreso'],
    'Nivel educativo' => $_GET['nivel'],
    ];
$file[] = $registro;

$file = json_encode($file);

file_put_contents('educacion.json',$file);
?>
