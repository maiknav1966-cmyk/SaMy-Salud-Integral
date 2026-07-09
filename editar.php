<?php
require_once 'Conexion.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: Mostrar.php');
    exit();
}

$id = intval($_GET['id']);

$stmt = mysqli_prepare($conexion, "SELECT id_paciente, nombre, apellido, edad, sexo, telefono, direccion, diagnostico, fecha_ingreso FROM pacientes WHERE id_paciente = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    mysqli_close($conexion);
    header('Location: Mostrar.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Editar Paciente</title>
    <style>body{font-family:Segoe UI,Arial;padding:20px;background:#f5f7fb} .card{max-width:580px;margin:30px auto;padding:18px;background:#fff;border-radius:10px;box-shadow:0 8px 20px rgba(11,37,64,0.06)}</style>
</head>
<body>
  <div class="card">
    <h2>Editar paciente #<?php echo htmlspecialchars($row['id_paciente']); ?></h2>
    <form action="actualizar.php" method="POST">
      <input type="hidden" name="id_paciente" value="<?php echo htmlspecialchars($row['id_paciente']); ?>">
      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>

      <label>Apellido:</label>
      <input type="text" name="apellido" value="<?php echo htmlspecialchars($row['apellido']); ?>" required>

      <label>Edad:</label>
      <input type="number" name="edad" value="<?php echo htmlspecialchars($row['edad']); ?>" required>

      <label>Sexo:</label>
      <select name="sexo" required>
        <option value="Masculino" <?php if($row['sexo']=='Masculino') echo 'selected'; ?>>Masculino</option>
        <option value="Femenino" <?php if($row['sexo']=='Femenino') echo 'selected'; ?>>Femenino</option>
        <option value="Otro" <?php if($row['sexo']=='Otro') echo 'selected'; ?>>Otro</option>
      </select>

      <label>Teléfono:</label>
      <input type="tel" name="telefono" value="<?php echo htmlspecialchars($row['telefono']); ?>">

      <label>Dirección:</label>
      <input type="text" name="direccion" value="<?php echo htmlspecialchars($row['direccion']); ?>">

      <label>Diagnóstico:</label>
      <input type="text" name="diagnostico" value="<?php echo htmlspecialchars($row['diagnostico']); ?>">

      <label>Fecha de ingreso:</label>
      <input type="date" name="fecha_ingreso" value="<?php echo htmlspecialchars($row['fecha_ingreso']); ?>">

      <button type="submit">Actualizar</button>
      <a href="listar.php" style="margin-left:12px">Cancelar</a>
    </form>
  </div>
</body>
</html>
