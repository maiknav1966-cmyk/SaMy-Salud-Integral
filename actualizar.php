<?php
require_once 'Conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: Mostrar.php');
    exit();
}

$required = ['id_paciente','nombre','apellido','edad','sexo','telefono','direccion','diagnostico','fecha_ingreso'];
foreach ($required as $f) {
    if (!isset($_POST[$f])) {
        header('Location: Mostrar.php');
        exit();
    }
}

$id = intval($_POST['id_paciente']);
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$edad = intval($_POST['edad']);
$sexo = trim($_POST['sexo']);
$telefono = trim($_POST['telefono']);
$direccion = trim($_POST['direccion']);
$diagnostico = trim($_POST['diagnostico']);
$fecha = trim($_POST['fecha_ingreso']);

$stmt = mysqli_prepare($conexion, "UPDATE pacientes SET nombre=?, apellido=?, edad=?, sexo=?, telefono=?, direccion=?, diagnostico=?, fecha_ingreso=? WHERE id_paciente = ?");
if (!$stmt) {
    mysqli_close($conexion);
    die('Error al preparar la actualización');
}
mysqli_stmt_bind_param($stmt, 'ssisssssi', $nombre, $apellido, $edad, $sexo, $telefono, $direccion, $diagnostico, $fecha, $id);
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    header('Location: listar.php?mensaje=actualizado');
    exit();
} else {
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    die('Error al actualizar registro');
}
