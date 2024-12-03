# Instalación de XAMPP (Paso a Paso)

Este documento describe el proceso de instalación y configuración de XAMPP para establecer un entorno de desarrollo local con Apache, MySQL, PHP y otros componentes necesarios para proyectos web.

---

## **1. Instalación de XAMPP**

### **En Windows**
1. **Descargar e instalar XAMPP**:
   - Descargue el instalador desde el sitio oficial de XAMPP: [https://www.apachefriends.org/es/index.html](https://www.apachefriends.org/es/index.html).
   - Ejecute el archivo descargado (`xampp-windows-x64-installer.exe`).
   - Si el sistema muestra un aviso de seguridad, seleccione la opción "Ejecutar de todos modos".

2. **Seleccionar los componentes**:
   - Durante la instalación, asegúrese de que los siguientes componentes estén seleccionados:
     - **Apache** (servidor web)
     - **MySQL** (base de datos)
     - **PHP** (lenguaje de programación)
     - **phpMyAdmin** (herramienta de gestión de bases de datos)
   - Los demás componentes, como Perl o Tomcat, son opcionales según los requisitos del proyecto.

3. **Elegir la carpeta de instalación**:
   - La ubicación por defecto es `C:\xampp`. Se recomienda dejar esta configuración a menos que se requiera una ubicación específica.

4. **Completar la instalación**:
   - Siga los pasos del asistente de instalación y haga clic en "Next" hasta finalizar.
   - Al completar, abra el **Panel de Control de XAMPP** para verificar la instalación.

---

## **2. Configuración y Uso de XAMPP**

1. **Iniciar el Panel de Control**:
   - Abra el archivo `xampp-control.exe` desde la carpeta de instalación (`C:\xampp` en Windows).
   - Para macOS o Linux, acceda al "Manager" de XAMPP.

2. **Activar los servicios necesarios**:
   - En el Panel de Control, haga clic en **Start** para iniciar los servicios:
     - **Apache** (servidor web)
     - **MySQL** (base de datos)
   - Verifique que los servicios estén activos (indicados con luces verdes).

3. **Probar el servidor local**:
   - Abra un navegador web e ingrese la siguiente URL:
     ```
     http://localhost
     ```
   - Si la instalación fue exitosa, se mostrará la página de inicio de XAMPP.

4. **Acceder a phpMyAdmin**:
   - Para gestionar bases de datos, ingrese la siguiente URL en el navegador:
     ```
     http://localhost/phpmyadmin
     ```
   - Desde phpMyAdmin, podrá crear, modificar y administrar bases de datos MySQL.




