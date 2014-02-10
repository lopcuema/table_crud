<?php

namespace modelos;

class empleados extends \core\sgbd\bd {
	
	public static $tabla = 'empleados';
	
	
	public static function create_table() {
		
		$consulta = "
			create table ".self::$tabla."
			(  id integer auto_increment
            ,  nombre varchar(50) not null
            ,  apellidos varchar(80)
            ,  direccion varchar(80)
            ,  fecha_alta date comment 'Formato inglés -> YYYY-MM-DD'
            ,  sueldo decimal (10,2) not null
            ,  primary key(id)
            )	
		";
		
		return self::execute($consulta);
		
	}
	
	
	/**
	 * El parámetro fila es un array que trae detro en otro array asociado al índice 'values' los valores de las columnas a insertar.
	 * Si hay errores en el mismos array se devuelven dentro del índice 'errores'.
	 * @param array &$fila = array('values' =>array('col1' => valo1, ), 'errores' => array('col1' => 'error1', ))
	 * @return boolean
	 */
	public static function insertar(array &$fila ) {
		
		
		$validacion = true;
		if ( ! isset($fila['values']['categoria']) or ! is_string($fila['values']['categoria'])) {
			$validacion = false;
			$fila['errores']['categoria'] = "Esta columna no puede esta vacía y debe ser un string.";
		}
		if ( ! isset($fila['values']['descripcion']) ) {
			$fila['values']['descripcion'] = null;
		}
		elseif ( ! is_string($fila['values']['descripcion'])) {
			$validacion = false;
			$fila['errores']['descripcon'] = "Esta columna debe ser un string.";
		}
		
		if ($validacion) {
		
			return self::insertar_fila($fila['values'], self::$tabla);
		}
		else {
			return false;
		}
	}
			
	 
	
	
	public static function borrar(array &$fila ) {
		
		
		$validacion = true;
		if ( ! isset($fila['values']['id']))  {
			$validacion = false;
			throw new \Exception(".....");
		}
		
		
		if ($validacion) {
		
			$consulta = "
				delete from ".self::$tabla."
					where categoria = '{$fila['values']['categoria']}' or id = {$fila['values']['id']}
				;		
			";

			return self::ejecutar_consulta($consulta);
		}
		else {
			return false;
		}
	}
		
	
}
