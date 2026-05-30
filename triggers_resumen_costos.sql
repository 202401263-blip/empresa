-- =====================================================
-- TRIGGERS PARA REFRESCAR RESUMEN DE COSTOS
-- Ejecutan automáticamente el SP cuando hay cambios en tablas de costos
-- =====================================================

USE Empresa_constructora;
GO

-- Trigger en tabla COMPRA (costo de materiales)
CREATE TRIGGER tr_compra_refrescar_costos
ON empresa_constructora5.compra
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
    SET NOCOUNT ON;
    EXEC dbo.p_refrescar_resumen_costos;
END;
GO

-- Trigger en tabla DETALLE_COMPRA
CREATE TRIGGER tr_detalle_compra_refrescar_costos
ON empresa_constructora5.detalle_compra
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
    SET NOCOUNT ON;
    EXEC dbo.p_refrescar_resumen_costos;
END;
GO

-- Trigger en tabla ASIGNACION_MAQUINARIA (costo de maquinaria)
CREATE TRIGGER tr_asignacion_maquinaria_refrescar_costos
ON empresa_constructora5.asignacion_maquinaria
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
    SET NOCOUNT ON;
    EXEC dbo.p_refrescar_resumen_costos;
END;
GO

-- Trigger en tabla CUOTAS_PAGO
CREATE TRIGGER tr_cuotas_pago_refrescar_costos
ON empresa_constructora5.cuotas_pago
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
    SET NOCOUNT ON;
    EXEC dbo.p_refrescar_resumen_costos;
END;
GO

-- Trigger en tabla COTIZACION
CREATE TRIGGER tr_cotizacion_refrescar_costos
ON empresa_constructora5.cotizacion
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
    SET NOCOUNT ON;
    EXEC dbo.p_refrescar_resumen_costos;
END;
GO

-- Trigger en tabla PAGO_EMPLEADO (costo de mano de obra)
CREATE TRIGGER tr_pago_empleado_refrescar_costos
ON empresa_constructora5.pago_empleado
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
    SET NOCOUNT ON;
    EXEC dbo.p_refrescar_resumen_costos;
END;
GO

-- =====================================================
-- Para eliminar los triggers si es necesario, usa:
-- DROP TRIGGER IF EXISTS tr_compra_refrescar_costos;
-- DROP TRIGGER IF EXISTS tr_detalle_compra_refrescar_costos;
-- DROP TRIGGER IF EXISTS tr_asignacion_maquinaria_refrescar_costos;
-- DROP TRIGGER IF EXISTS tr_cuotas_pago_refrescar_costos;
-- DROP TRIGGER IF EXISTS tr_cotizacion_refrescar_costos;
-- DROP TRIGGER IF EXISTS tr_pago_empleado_refrescar_costos;
-- =====================================================
