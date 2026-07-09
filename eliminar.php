<?php
require_once 'Conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id']) || !is_numeric($_POST['id'])) {
    header('Location: listar.php');
    exit();
}

$id = intval($_POST['id']);

$stmt = mysqli_prepare($conexion, "DELETE FROM pacientes WHERE id_paciente = ?");
if (!$stmt) {
    mysqli_close($conexion);
    die('Error al preparar eliminación');
}
mysqli_stmt_bind_param($stmt, 'i', $id);
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    header('Location: listar.php?mensaje=eliminado');
    exit();
} else {
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    die('Error al eliminar registro');
}
