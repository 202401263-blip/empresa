<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('empresa_constructora5.usuario')) {
            return;
        }

        DB::statement("
            CREATE TABLE empresa_constructora5.usuario (
                id_usuario INT IDENTITY(1,1) PRIMARY KEY,
                nombre_completo NVARCHAR(120) NULL,
                nombre_usuario NVARCHAR(80) NULL,
                usuario NVARCHAR(80) NOT NULL,
                correo NVARCHAR(120) NULL,
                contrasena NVARCHAR(255) NOT NULL,
                rol NVARCHAR(40) NOT NULL,
                activo BIT NOT NULL CONSTRAINT DF_usuario_activo DEFAULT (1),
                fecha_creacion DATETIME2 NOT NULL CONSTRAINT DF_usuario_fecha DEFAULT (SYSUTCDATETIME())
            )
        ");

        DB::statement('CREATE UNIQUE INDEX UX_usuario_login ON empresa_constructora5.usuario (usuario)');
    }

    public function down(): void
    {
        DB::statement('DROP TABLE IF EXISTS empresa_constructora5.usuario');
    }
};
