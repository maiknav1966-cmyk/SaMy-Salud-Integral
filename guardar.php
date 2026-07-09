<?php
require_once 'Conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$required = ['nombre','apellido','edad','sexo','telefono','direccion','diagnostico','fecha_ingreso'];
foreach ($required as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        header('Location: index.php?mensaje=error_campos');
        exit();
    }
}

$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$edad = intval($_POST['edad']);
$sexo = trim($_POST['sexo']);
$telefono = trim($_POST['telefono']);
$direccion = trim($_POST['direccion']);
$diagnostico = trim($_POST['diagnostico']);
$fecha = trim($_POST['fecha_ingreso']);

// Cambia 'pacientes' por el nombre real de tu tabla si es otro
$tabla = 'pacientes';

// Prepared statement para evitar inyección SQL
$stmt = mysqli_prepare($conexion, "INSERT INTO $tabla (nombre, apellido, edad, sexo, telefono, direccion, diagnostico, fecha_ingreso) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    // No exponer errores en producción; aquí se muestra para depuración
    echo "❌ Error al preparar la consulta: " . mysqli_error($conexion);
    mysqli_close($conexion);
    exit();
}

mysqli_stmt_bind_param($stmt, 'ssisssss', $nombre, $apellido, $edad, $sexo, $telefono, $direccion, $diagnostico, $fecha);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    header('Location: index.php?mensaje=exito');
    exit();
} else {
    // Registrar error en un log es más seguro; se muestra aquí para desarrollo
    echo "❌ Error al guardar: " . mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    exit();
}
?>