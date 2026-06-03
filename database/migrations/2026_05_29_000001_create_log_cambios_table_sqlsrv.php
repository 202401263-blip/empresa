<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('empresa_constructora5.log_cambios')) {
            // Tabla ya existe — verificar que tenga todas las columnas esperadas
            if (! Schema::hasColumn('empresa_constructora5.log_cambios', 'datos_anteriores')) {
                DB::statement("ALTER TABLE empresa_constructora5.log_cambios ADD datos_anteriores NVARCHAR(MAX) NULL");
            }
            if (! Schema::hasColumn('empresa_constructora5.log_cambios', 'datos_nuevos')) {
                DB::statement("ALTER TABLE empresa_constructora5.log_cambios ADD datos_nuevos NVARCHAR(MAX) NULL");
            }
            return;
        }

        DB::statement("
            CREATE TABLE empresa_constructora5.log_cambios (
                id_log           INT IDENTITY(1,1)  NOT NULL CONSTRAINT PK_log_cambios PRIMARY KEY,
                id_usuario       INT                NULL,
                tabla_afectada   NVARCHAR(80)       NOT NULL,
                tipo_operacion   NVARCHAR(10)       NOT NULL,
                descripcion      NVARCHAR(500)      NULL,
                fecha_hora       DATETIME2(0)       NOT NULL CONSTRAINT DF_log_cambios_fecha DEFAULT (SYSUTCDATETIME()),
                datos_anteriores NVARCHAR(MAX)      NULL,
                datos_nuevos     NVARCHAR(MAX)      NULL,
                CONSTRAINT FK_log_cambios_usuario
                    FOREIGN KEY (id_usuario)
                    REFERENCES empresa_constructora5.usuario (id_usuario)
                    ON DELETE SET NULL
            )
        ");

        // Índices para filtrado rápido
        DB::statement("CREATE INDEX IX_log_cambios_usuario   ON empresa_constructora5.log_cambios (id_usuario)");
        DB::statement("CREATE INDEX IX_log_cambios_fecha     ON empresa_constructora5.log_cambios (fecha_hora DESC)");
        DB::statement("CREATE INDEX IX_log_cambios_tabla     ON empresa_constructora5.log_cambios (tabla_afectada)");
        DB::statement("CREATE INDEX IX_log_cambios_operacion ON empresa_constructora5.log_cambios (tipo_operacion)");
    }

    public function down(): void
    {
        DB::statement('DROP TABLE IF EXISTS empresa_constructora5.log_cambios');
    }
};
