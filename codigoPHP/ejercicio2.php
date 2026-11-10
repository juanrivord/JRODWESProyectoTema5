<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="../webroot/css/style.css">
    <style>
        .azul {
            color: blue;
        }

        .rojo {
            color: red;
        }
    </style>
</head>
<header id="inicio">
    <img src="../webroot/images/logo.png" alt="Logo de I.E.S. Los Sauces" class="logo">
    <h1>TEMA 5: Desarrollo de aplicaciones web</h1>
</header>

<body>
    <!--
        -- Juan Rivera Ordoñez
        -- 10/11/2026
        -- Ejercicio 02 (Tema 5). Desarrollo de un control de acceso con identificación del usuario basado en la función header() 
        -- y en el uso de una tabla “Usuario” de la base de datos. (PDO)
    -->

    <?php
    require_once '../core/231018libreriaValidacion.php';
    require_once '../config/configDBPDO.php';

    echo "<a href='../indexProyectoTema5.php'>⬅ Volver al inicio</a><br><br>";

    $inicioSesionOK = true;

    if (isset($_SERVER['PHP_AUTH_USER'])) {

        try {

            $miDB = new PDO(HOST, USER, PASSWORD);

            $sqlSelect = <<<sql
                SELECT * FROM T01_Usuario
                WHERE T01_CodUsuario = :codUsuario and T01_Password = SHA2(:password,256)
                sql;
            $selectUsuarioContrasena = $miDB->prepare($sqlSelect);

            $selectUsuarioContrasena->execute([
                ':codUsuario' => $_SERVER['PHP_AUTH_USER'],
                ':password' => $_SERVER['PHP_AUTH_USER'] . $_SERVER['PHP_AUTH_PW']
            ]);

            if ($selectUsuarioContrasena->rowCount() != 1) {
                $inicioSesionOK = false;
            }

        } catch (PDOException $miExceptionPDO) {


            echo "<h3 style='margin-top:0;'>Error en la base de datos.</h3>";
            echo "<p><b>Mensaje:</b> " . $miExceptionPDO->getMessage() . "</p>";
            echo "<p><b>Código:</b> " . $miExceptionPDO->getCode() . "</p>";
        } finally {
            unset($miDB);
        }

    } else {
        $inicioSesionOK = false;
    }

    if (!$inicioSesionOK) {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo "Usuario no reconocido!";
        exit;

    } else {
        echo 'Accesso Permitido <br />';
        echo "Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br />";
        echo "Contraseña: " . $_SERVER['PHP_AUTH_PW'] . "<br />";
    }

    ?>

</body>
<footer>
    <address>
        <p>&copy; 2025-2026 <span><a href="../indexProyectoTema5.php">Juan Rivera Ordoñez</a></span>- I.E.S. Los Sauces
        </p>
        <a href="https://github.com/juanrivord/JRODWESProyectoTema5"><img src="../webroot/images/github.png"
                alt="Imagen de github"></a>
        <a href="../indexProyectoTema4.php"><img src="../webroot/images/casita.png" alt="Imagen de una casita"></a>
    </address>
</footer>

</html>