<?php
if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'exito') {
    $mensaje = "<div class='mensaje-exito'>✅ Paciente registrado con éxito</div>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Salud Integral</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
            /* split the same image into left and right halves, with a translucent gradient overlay on top */
            background-image: linear-gradient(135deg, rgba(7,58,89,0.34) 0%, rgba(44,114,160,0.30) 45%, rgba(137,190,214,0.28) 100%), url('sala%20de%20espera.jpg'), url('sala%20de%20espera.jpg');
            background-position: center, left center, right center;
            background-size: auto, 50% 100%, 50% 100%;
            background-repeat: no-repeat, no-repeat, no-repeat;
        }

        body::before,
        body::after {
            content: "";
            position: absolute;
            top: 0;
            width: 220px;
            height: 100%;
            background: rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(2px);
            pointer-events: none;
        }

        body::before {
            left: 0;
        }

        body::after {
            right: 0;
        }

        form {
            width: 500px;
            padding: 35px 30px;
            background: rgba(255, 255, 255, 0.96);
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(4px);
        }

        h2 {
            text-align: center;
            color: #2d3748;
            font-size: 26px;
            margin-bottom: 25px;
            font-weight: 700;
        }

        .mensaje-exito {
            background: #48bb78;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 15px;
            box-shadow: 0 4px 15px rgba(72, 187, 120, 0.4);
        }

        label {
            display: block;
            margin-top: 14px;
            font-weight: 600;
            color: #2d3748;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 11px 14px;
            margin-top: 5px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f7fafc;
            color: #2d3748;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }

        input::placeholder {
            color: #a0aec0;
        }

        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 14px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 600;
            margin-top: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        button:active {
            transform: translateY(0);
        }

        .links {
            text-align: center;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 2px solid #e2e8f0;
        }

        .links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 8px;
        }

        .links a:hover {
            background: #667eea;
            color: white;
            text-decoration: none;
        }

        .autores {
            margin-top: 18px;
            text-align: center;
            color: #0b2540;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            position: relative;
            z-index: 3;
        }

        .autores span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.95);
            color: #0b2540;
            padding: 8px 12px;
            border-radius: 999px;
            border: 1px solid rgba(102, 126, 234, 0.18);
            box-shadow: 0 6px 18px rgba(11, 37, 64, 0.06);
        }

        @media (max-width: 600px) {
            form {
                padding: 25px 20px;
                width: 100%;
            }
            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

    <form action="guardar.php" method="POST">
        <h2>🏥 Registro de Pacientes</h2>

        <?php if (isset($mensaje)) echo $mensaje; ?>

        <label>👤 Nombre:</label>
        <input type="text" name="nombre" placeholder="Ingrese el nombre" required>

        <label>👤 Apellido:</label>
        <input type="text" name="apellido" placeholder="Ingrese el apellido" required>

        <label>📅 Edad:</label>
        <input type="number" name="edad" placeholder="Ingrese la edad" required>

        <label>⚤ Sexo:</label>
        <select name="sexo">
            <option value="">Seleccione una opción</option>
            <option value="Masculino">👨 Masculino</option>
            <option value="Femenino">👩 Femenino</option>
            <option value="Otro">⚧ Otro</option>
        </select>

        <label>📞 Teléfono:</label>
        <input type="tel" name="telefono" placeholder="Ingrese el teléfono" pattern="[0-9]{10,12}" minlength="10" maxlength="12" title="El teléfono debe tener entre 10 y 12 dígitos">

        <label>📍 Dirección:</label>
        <input type="text" name="direccion" placeholder="Ingrese la dirección">

        <label>🩺 Diagnóstico:</label>
        <input type="text" name="diagnostico" placeholder="Ingrese el diagnóstico">

        <label>📆 Fecha de Ingreso:</label>
        <input type="date" name="fecha_ingreso">

        <button type="submit">💾 Guardar Registro</button>

        <div class="autores">
            <span>👩 Martínez Roa Rosa Maria</span>
            <span>👨 Nava Sanchez Victor Mario</span>
        </div>

        <div class="links">
            <a href="listar.php">📋 Ver todos los pacientes</a>
        </div>
    </form>

</body>
</html>