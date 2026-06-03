  # Sistema de Gestión Empresarial Constructora

  Sistema integral de gestión para empresa constructora, desarrollado con Laravel 11 sobre motor SQL Server, que centraliza la operación de ventas,
  proyectos, finanzas y logística en un único entorno unificado.

  ---

  ## 1. ARQUITECTURA DEL PROYECTO

  ### Descripción del Sistema

  Plataforma web que integra y automatiza los procesos operativos de una empresa constructora mediante módulos especializados:

  - **Clientes**: Gestión de información de clientes, historial de contratos y seguimiento de pagos.
  - **Contratos**: Creación, seguimiento y control de contratos con generación automática de cuotas de pago.
  - **Proyectos**: Administración de proyectos constructivos con asignación de recursos y seguimiento de avance.
  - **Cotizaciones**: Creación y gestión de cotizaciones para clientes con cálculo automático de materiales y mano de obra.
  - **Compras**: Control de compras de materiales, proveedores y órdenes de compra con integración de inventario.
  - **Alertas**: Notificaciones automáticas de vencimientos, pagos pendientes y eventos críticos.
  - **Auditoría**: Registro completo de actividad del sistema con trazabilidad de cambios y sesiones de usuario.

  ### Stack Tecnológico

  | Componente | Tecnología |
  |------------|------------|
  | Framework | Laravel 11 |
  | Lenguaje | PHP 8.2+ |
  | Base de Datos | SQL Server (driver `sqlsrv`) |
  | Frontend | Bootstrap 5, FontAwesome 6 |
  | Build Tool | Vite, NPM |
  | Autenticación | Laravel Breeze/Sanctum |

  ### Mapa Visual del Repositorio

```
constructora-system/
├── README.md                      # Este documento principal
├── triggers_resumen_costos.sql    # Triggers SQL Server para costos automáticos
│
└── empresa/                       # Subcarpeta con el Proyecto Laravel 11 (backend)
    ├── app/
    │   ├── Http/Controllers/      # Controladores de la aplicación
    │   ├── Models/                # Modelos Eloquent mapeados a SQL Server
    │   └── Providers/             # Proveedores de servicios (AppServiceProvider)
    ├── config/                    # Configuraciones del framework (auth.php)
    ├── database/
    │   ├── migrations/            # Migraciones de la base de datos
    │   └── seeders/               # Poblado de datos iniciales
    ├── resources/
    │   └── views/                 # Vistas Blade con Bootstrap 5 (reportes)
    ├── routes/
    │   └── web.php                # Archivo de rutas de la aplicación
    ├── public/                    # Punto de entrada público del servidor web
    ├── composer.json              # Dependencias de paquetes PHP
    └── .env.example               # Plantilla de variables de entorno
```
  ---

  ## 2. REQUISITOS PREVIOS E INSTALACIÓN

  ### Requisitos del Entorno

  - PHP 8.2 o superior
  - Composer (gestor de dependencias PHP)
  - Node.js & NPM
  - Extensión `PDO_SQLSRV` habilitada en `php.ini`
  - SQL Server 2019+ (esquema `empresa_constructora5`)

  ### Paso a Paso de Instalación

  #### 1. Clonar repositorio

  ```bash
  git clone <url-repositorio> constructora-system
  cd constructora-system
  ```

  #### 2. Configurar el entorno

  ```bash
  cd empresa
  cp .env.example .env
  ```

  Editar `.env` con las credenciales de conexión:

  ```env
  DB_CONNECTION=sqlsrv
  DB_HOST=127.0.0.1
  DB_PORT=1433
  DB_DATABASE=Empresa_constructora5
  DB_USERNAME=usuario_db
  DB_PASSWORD=contraseña_db
  ```

  > **Importante**: Verificar que el proveedor de usuarios en `config/auth.php` apunte correctamente al modelo deseado, especialmente si se han realizado migraciones personalizadas.

  #### 3. Instalar dependencias

  ```bash
  composer install
  npm install
  ```

  #### 4. Generar llave de aplicación y limpiar caché

  ```bash
  php artisan key:generate
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

  #### 5. Iniciar el servidor de desarrollo

  ```bash
  npm run dev    # En una terminal para compilar assets
  php artisan serve  # En otra terminal para el servidor Laravel
  ```

  La aplicación estará disponible en `http://localhost:8000`

  ---

  ## 3. MÓDULOS RECIENTES IMPLEMENTADOS (LOGS & COSTOS)

  ### Log de Auditoría

  El sistema implementa auditoría automática mediante dos mecanismos de Laravel 11:

  - **Event Discovery**: Eventos automáticos que capturan Login y Logout de usuarios sin necesidad de registro manual. Los eventos `LogUserLogin` y `LogUserLogout` registran en la tabla física `log_cambios` de SQL Server con timestamp, ID de usuario y dirección IP.
  
  - **Observers globales**: Cada modelo Eloquent dispone de observers que interceptan operaciones `created`, `updated` y `deleted`, persistiendo automáticamente en `log_cambios` con el tipo de operación, tabla afectada, datos previos y nuevos, garantizando trazabilidad completa de transacciones CRUD.

  ### Resumen de Costos

  El módulo de costos financieros proporciona consolidación en tiempo real mediante:

  - **Procedimiento Almacenado** `dbo.p_refrescar_resumen_costos`: Calcula automáticamente los costos desglosados de materiales (`compra`/`detalle_compra`), maquinaria (`asignacion_maquinaria`) y mano de obra (`pago_empleado`).
  
  - **Triggers automáticos**: Los triggers definidos en `triggers_resumen_costos.sql` ejecutan el SP tras cada operación INSERT, UPDATE o DELETE en las tablas de costos, manteniendo el reporte financiero consolidado actualizado sin intervención manual.
  
  - **Acceso**: El endpoint `/dashboard` expone el reporte `resumen_costos` con indicadores clave para toma de decisiones.

  ---

  ## 4. FLUJO DE TRABAJO EN GIT (GITFLOW)

  ### Directrices para Desarrolladores

  - ⛔ **Prohibido** pushear directo a `main` o `developer`. Estas ramas están protegidas y requieren revisión por pares.
  - ✅ Todos los cambios deben servirse en ramas `feature/*` aprobadas mediante Pull Request.
  - 🔄 Mantener sincronización constante con `developer` mediante rebase o merge.

  ### Pasos para Subir Cambios

  #### 1. Crear rama feature

  ```bash
  git checkout developer
  git pull origin developer
  git checkout -b feature/nombre-descriptivo
  ```

  #### 2. Realizar commits semánticos

  ```bash
  git add .
  git commit -m "feat: agregar validación de cuotas en módulo contratos"
  ```

  **Prefijos obligatorios:**

  - `feat:` — Nueva funcionalidad
  - `fix:` — Corrección de bug
  - `refactor:` — Refactorización de código
  - `docs:` — Documentación
  - `style:` — Formateo/estilos
  - `test:` — Tests

  #### 3. Abrir Pull Request

  ```bash
  git push origin feature/nombre-descriptivo
  ```

  Crear Pull Request desde `feature/*` hacia `developer` en GitHub/GitLab. Asignar revisores y esperar aprobación antes de merge.

  ---

  ## 5. VARIABLES DE ENTORNO IMPORTANTES

  Las siguientes variables en `.env` son críticas para el funcionamiento:

  | Variable | Descripción | Ejemplo |
  |----------|-------------|---------|
  | `APP_ENV` | Ambiente (local, staging, production) | `local` |
  | `APP_DEBUG` | Modo debug | `true` (solo desarrollo) |
  | `DB_CONNECTION` | Driver de base de datos | `sqlsrv` |
  | `DB_HOST` | Servidor SQL Server | `127.0.0.1` |
  | `DB_DATABASE` | Base de datos | `Empresa_constructora5` |
  | `SESSION_DRIVER` | Driver de sesión | `file` o `cookie` |

  > ⚠️ **Nunca** versionar `.env` con credenciales reales. Siempre usar `.env.example` como referencia.

  ---

  ## 6. SOLUCIÓN DE PROBLEMAS COMUNES

  ### Error: SQLSTATE[HY000]: General error

  **Causa**: La extensión `PDO_SQLSRV` no está habilitada o SQL Server no es accesible.

  **Solución**:
  ```bash
  # Verificar si la extensión está cargada
  php -i | grep sqlsrv
  # Si no aparece, habilitar en php.ini
  extension=php_pdo_sqlsrv.dll
  ```

  ### Error: "Class not found" o "Model not found"

  **Causa**: Caché de Laravel desactualizado.

  **Solución**:
  ```bash
  php artisan clear-all
  php artisan cache:clear
  composer dump-autoload
  ```

  ### Assets (CSS/JS) no se cargan en navegador

  **Causa**: Vite no está compilando assets.

  **Solución**: Asegurar que `npm run dev` está ejecutándose en otra terminal.

  ---

  ## 7. SOPORTE Y CONTACTO

  Para reportar problemas, sugerencias o consultas sobre el sistema:

  - 📧 **Email**: contacto@empresa.constructora
  - 🐛 **Issues**: Abrir issue en el repositorio de Git
  - 📋 **Documentación**: Consultar la wiki del repositorio para guías detalladas