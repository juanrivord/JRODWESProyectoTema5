# Proyecto Tema 5 - Desarrollo Web en Entorno Servidor

**Autor:** Juan Rivera Ordoñez
**Centro:** I.E.S. Los Sauces
**Curso:** 2025-2026

Proyecto de la asignatura **Desarrollo Web en Entorno Servidor (DWES)** correspondiente al **Tema 5: Desarrollo de aplicaciones web**. Contiene los ejercicios de control de acceso con autenticación HTTP Basic (`header()`), tanto con credenciales fijas como validando usuarios contra una base de datos MariaDB/MySQL mediante **PDO**.

## Ejercicios

| # | Descripción | Archivo |
|---|-------------|---------|
| 0 | Mostrar el contenido de las variables superglobales y `phpinfo()` | [codigoPHP/ejercicio0.php](codigoPHP/ejercicio0.php) |
| 1 | Control de acceso con identificación del usuario basado en la función `header()` | [codigoPHP/ejercicio1.php](codigoPHP/ejercicio1.php) |
| 2 | Control de acceso con `header()` validando el usuario contra la tabla `T01_Usuario` de la base de datos (PDO) | [codigoPHP/ejercicio2.php](codigoPHP/ejercicio2.php) |

La página principal [indexProyectoTema5.php](indexProyectoTema5.php) enlaza a cada ejercicio para ejecutarlo y para ver su código fuente.

## Estructura del proyecto

```
JRODWESProyectoTema5/
├── indexProyectoTema5.php   # Página principal con el listado de ejercicios
├── codigoPHP/               # Ejercicios del tema
├── mostrarcodigo/           # Páginas que muestran el código fuente de ejercicios y scripts
├── config/
│   └── configDBPDO.php      # Constantes de conexión a la base de datos (PDO)
├── core/
│   └── 231018libreriaValidacion.php  # Librería de validación de formularios
├── scriptDB/                # Scripts SQL de la base de datos
│   ├── CreaDBJRODWESProyectoTema5.sql
│   ├── CargaInicialDBJRODWESProyectoTema5.sql
│   └── BorraDBJRODWESProyectoTema5.sql
├── webroot/                 # Recursos estáticos (CSS e imágenes)
├── doc/  error/  tmp/       # Carpetas auxiliares
└── README.md
```

## Base de datos

Base de datos: `DBJRODWESProyectoTema5`

- **T01_Usuario**: usuarios de la aplicación (código, contraseña cifrada con `SHA2(usuario + contraseña, 256)`, descripción, última conexión, número de conexiones, perfil e imagen).
- **T02_Departamento**: departamentos (código, descripción, fecha de creación, volumen de negocio y fecha de baja).

Scripts disponibles en [scriptDB/](scriptDB/):

1. `CreaDBJRODWESProyectoTema5.sql` – crea la base de datos, las tablas y el usuario `userJRODWESProyectoTema5`.
2. `CargaInicialDBJRODWESProyectoTema5.sql` – inserta datos de ejemplo (departamentos y usuarios `admin` y `juan`).
3. `BorraDBJRODWESProyectoTema5.sql` – elimina la base de datos y el usuario.

## Puesta en marcha

1. Disponer de un servidor web con **PHP 8** y la extensión **PDO MySQL**, y de un servidor **MariaDB/MySQL**.
2. Ejecutar los scripts `CreaDB...sql` y `CargaInicialDB...sql`.
3. Ajustar en [config/configDBPDO.php](config/configDBPDO.php) el host, usuario y contraseña según el entorno (clase, máquina o casa; basta con descomentar el bloque correspondiente).
4. Desplegar el proyecto en el servidor y acceder a `indexProyectoTema5.php`.

## Tecnologías

- PHP 8 (PDO)
- MariaDB / MySQL
- HTML5 y CSS3
