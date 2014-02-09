
<form method='post' name='<?php echo \core\Array_Datos::contenido("form_name", $datos); ?>' action="?menu=<?php echo $datos['controlador_clase']; ?>&submenu=validar_<?php echo $datos['controlador_metodo']; ?>" >
	
	<?php echo \core\HTML_Tag::form_registrar($datos["form_name"], "post"); ?>
	<input id='id' name='id' type='hidden' value='<?php echo \core\Array_Datos::values('id', $datos); ?>' />
	Nombre: <input id='nombre' name='nombre' type='text' size='100'  maxlength='100' value='<?php echo \core\Array_Datos::values('nombre', $datos); ?>'/>
	<?php echo \core\HTML_Tag::span_error('nombre', $datos); ?>
	<br />
    Apellidos:<input id='apellidos' name='apellidos' type='text' size='100'  maxlength='100' value='<?php echo \core\Array_Datos::values('apellidos', $datos); ?>'/>
	<?php echo \core\HTML_Tag::span_error('apellidos', $datos); ?>
    <br/>
    Dirección:
	<input id='direccion' name='direccion' type='text' type='text' size='100'  maxlength='100' value='<?php echo \core\Array_Datos::values('direccion', $datos); ?>'/>
	<?php echo \core\HTML_Tag::span_error('direccion', $datos); ?>
    <br />
    Sueldo: <input id='sueldo' name='sueldo' type='text' size='15'  maxlength='20' value='<?php echo \core\Conversiones::decimal_punto_a_coma(\core\Array_Datos::values('sueldo', $datos)); ?>'/>
	<?php echo \core\HTML_Tag::span_error('sueldo', $datos); ?>
    <br />
    

	<br />
	<?php echo \core\HTML_Tag::span_error('errores_validacion', $datos); ?>
	
	<input type='submit' value='Enviar'>
	<input type='reset' value='Limpiar'>
    <button type='button' onclick='location.assign("<?php echo \core\URL::generar('empleados/index');?>")'>Cancelar</button>
</form>
