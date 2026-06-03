<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hacer id_registro nullable (para registros de sesión sin record ID)
        // Primero verificamos si ya permite null
        $col = DB::selectOne("
            SELECT IS_NULLABLE
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_SCHEMA = 'empresa_constructora5'
              AND TABLE_NAME   = 'log_cambios'
              AND COLUMN_NAME  = 'id_registro'
        ");

        if ($col && $col->IS_NULLABLE === 'NO') {
            DB::statement("
                ALTER TABLE empresa_constructora5.log_cambios
                ALTER COLUMN id_registro INT NULL
            ");
        }

        // Agregar columna id_usuario (FK a usuario) si no existe
        if (! Schema::hasColumn('empresa_constructora5.log_cambios', 'id_usuario')) {
            DB::statement("
                ALTER TABLE empresa_constructora5.log_cambios
                ADD id_usuario INT NULL
                CONSTRAINT FK_log_cambios_usuario
                    REFERENCES empresa_constructora5.usuario (id_usuario)
                    ON DELETE SET NULL
            ");
        }
    }

    public function down(): void
    {
        // Revertir: quitar FK y columna id_usuario
        if (Schema::hasColumn('empresa_constructora5.log_cambios', 'id_usuario')) {
            // Primero dropar el constraint FK si existe
            $fk = DB::selectOne("
                SELECT name FROM sys.foreign_keys
                WHERE name = 'FK_log_cambios_usuario'
            ");
            if ($fk) {
                DB::statement("ALTER TABLE empresa_constructora5.log_cambios DROP CONSTRAINT FK_log_cambios_usuario");
            }
            DB::statement("ALTER TABLE empresa_constructora5.log_cambios DROP COLUMN id_usuario");
        }
    }
};
