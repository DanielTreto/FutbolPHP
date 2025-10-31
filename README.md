# FutbolPHP

FutbolPHP es una aplicación web desarrollada en PHP que permite gestionar partidos y equipos de fútbol, facilitando la visualización y administración de información relevante sobre encuentros y plantillas.

## Estructura del proyecto

- **app/**  
  Contiene la lógica principal de la aplicación:
  - [`equipos.php`](https://github.com/DanielTreto/FutbolPHP/blob/main/app/equipos.php): Gestión y visualización de los equipos disponibles.
  - [`logout.php`](https://github.com/DanielTreto/FutbolPHP/blob/main/app/logout.php): Permite cerrar la sesión del usuario.
  - [`partidos.php`](https://github.com/DanielTreto/FutbolPHP/blob/main/app/partidos.php): Muestra y gestiona los partidos.
  - [`partidosEquipo.php`](https://github.com/DanielTreto/FutbolPHP/blob/main/app/partidosEquipo.php): Visualiza los partidos de un equipo específico.

- **assets/**  
  Carpeta para recursos estáticos:
  - [`css/`](https://github.com/DanielTreto/FutbolPHP/tree/main/assets/css): Hojas de estilos.
  - [`js/`](https://github.com/DanielTreto/FutbolPHP/tree/main/assets/js): Scripts JavaScript.

- **templates/**  
  Plantillas para la presentación de la información:
  - [`header.php`](https://github.com/DanielTreto/FutbolPHP/blob/main/templates/header.php): Encabezado común de la aplicación.
  - [`plantillaEquipos.php`](https://github.com/DanielTreto/FutbolPHP/blob/main/templates/plantillaEquipos.php): Plantilla para mostrar equipos.
  - [`plantillaPartidos.php`](https://github.com/DanielTreto/FutbolPHP/blob/main/templates/plantillaPartidos.php): Plantilla para mostrar partidos.

- **utils/**  
  Funcionalidades auxiliares:
  - [`SessionHelper.php`](https://github.com/DanielTreto/FutbolPHP/blob/main/utils/SessionHelper.php): Gestiona la sesión del usuario y el flujo de autenticación.

- **persistence/**  
  Carpeta destinada a la capa de persistencia de datos, donde se gestionan las operaciones relacionadas con la base de datos.

- **index.php**  
  [Archivo principal](https://github.com/DanielTreto/FutbolPHP/blob/main/index.php) que inicia la sesión y redirige al usuario según el contexto (equipos o partidos).

## Funcionamiento

Al acceder a la aplicación, se inicia la sesión y se redirige al usuario a la gestión de equipos o partidos, dependiendo del estado actual. Las funcionalidades permiten:
- Visualizar y administrar equipos.
- Ver partidos y detalles de cada encuentro.
- Consultar los partidos de un equipo específico.
- Cerrar sesión.

Todo el código está implementado usando PHP, y la interfaz se apoya en recursos CSS/JS para mejorar la experiencia de usuario.

## Instalación y uso

1. Clona el repositorio:
   ```bash
   git clone https://github.com/DanielTreto/FutbolPHP.git
   ```
2. Configura el entorno PHP necesario y asegúrate de tener acceso al servidor web.
3. **Importa la base de datos** ejecutando el archivo SQL incluido en el repositorio (por ejemplo, desde phpMyAdmin o la línea de comandos de MySQL).
4. Accede vía navegador a `index.php` para comenzar a usar la aplicación.

## Licencia

Este proyecto es de uso libre para aprendizaje y desarrollo personal.
