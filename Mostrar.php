<?php
// Preserve the old filename as an alias to the new listing page
header('Location: listar.php');
exit();
?>
<?php require_once 'Conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Lista de Pacientes</title>
    <style>
        body{font-family:Segoe UI,Arial;background:#f6f8fb;padding:28px}
        .container{max-width:1100px;margin:0 auto;background:#fff;padding:20px;border-radius:10px;box-shadow:0 8px 30px rgba(11,37,64,0.04)}
        table{width:100%;border-collapse:collapse;margin-top:18px}
        th,td{padding:10px;border-bottom:1px solid #eef3f8;text-align:left}
        th{background:#fbfdff}
        .btn-edit{display:inline-flex;align-items:center;gap:6px;background:#ffd966;padding:6px 10px;border-radius:8px;color:#0b2540;text-decoration:none;border:1px solid rgba(0,0,0,0.06);font-weight:600}
        .btn-delete{display:inline-flex;align-items:center;gap:6px;background:#ff6b6b;padding:6px 10px;border-radius:8px;color:#fff;text-decoration:none;border:1px solid rgba(0,0,0,0.06);font-weight:600}
        .actions{white-space:nowrap;display:flex;gap:8px;align-items:center}
        .btn-add{background:#4f78ff;color:#fff;padding:8px 12px;border-radius:8px;text-decoration:none}
        .message{padding:12px 14px;border-radius:8px;margin-bottom:12px}
        .message.success{background:#e6ffef;color:#0b6b3a;border:1px solid #b7f0cf}
        .message.info{background:#eef6ff;color:#0b4a8a;border:1px solid #cfe4ff}
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['mensaje'])) {
            $msg = htmlspecialchars($_GET['mensaje']);
            if ($msg === 'exito') {
                echo '<div class="message success">✅ Paciente registrado con éxito</div>';
            } elseif ($msg === 'actualizado') {
                echo '<div class="message success">✅ Registro actualizado correctamente</div>';
            } elseif ($msg === 'eliminado') {
                echo '<div class="message success">✅ Registro eliminado correctamente</div>';
            } elseif ($msg === 'error_campos') {
                echo '<div class="message">⚠️ Faltan campos obligatorios</div>';
            }
        }
        ?>
        <h2>📋 Lista de Pacientes</h2>

        <div class="header-actions">
            <a href="index.php" class="btn-add">➕ Nuevo Paciente</a>
            <div class="total">
                Total: <span id="totalPacientes">0</span> pacientes
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Diagnóstico</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Cambia 'pacientes' por el nombre real de tu tabla si es otro
                $tabla = 'pacientes';
                $sql = "SELECT * FROM $tabla";
                $resultado = mysqli_query($conexion, $sql);
                $total = 0;

                if ($resultado && $resultado !== false) {
                    $total = mysqli_num_rows($resultado);
                    if ($total > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td><strong>" . htmlspecialchars($fila['id_paciente']) . "</strong></td>";
                            echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                            echo "<td>" . htmlspecialchars($fila['apellido']) . "</td>";
                            echo "<td>" . htmlspecialchars($fila['edad']) . "</td>";
                            echo "<td>" . htmlspecialchars($fila['sexo']) . "</td>";
                            echo "<td>" . htmlspecialchars($fila['telefono']) . "</td>";
                            echo "<td>" . htmlspecialchars($fila['direccion']) . "</td>";
                            echo "<td>" . htmlspecialchars($fila['diagnostico']) . "</td>";
                            echo "<td>" . htmlspecialchars($fila['fecha_ingreso']) . "</td>";
                            echo "<td class='actions'>";
                            echo "<a href='editar.php?id=" . urlencode($fila['id_paciente']) . "' class='btn-edit' style='margin-right:8px'>✏️ Editar</a>";
                            echo "<a href='eliminar.php?id=" . urlencode($fila['id_paciente']) . "' class='btn-delete' onclick=\"return confirm('¿Eliminar paciente?');\">🗑️ Eliminar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10' class='no-data'>📭 No hay pacientes registrados</td></tr>";
                    }
                    mysqli_free_result($resultado);
                } else {
                    // Error en la consulta: mostrar mensaje amigable
                    echo "<tr><td colspan='10' class='no-data'>❌ Error al obtener datos</td></tr>";
                }
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('totalPacientes').textContent = <?php echo json_encode($total); ?>;
    </script>
</body>
</html>