<div id="index">
	<h1>Listado de empleados</h1>
	<p>
		<!--<a href='?menu=articulos&submenu=listado_js' title='Devuelve objeto json con una propiedad que contiene un array'>Listado en json</a> - 
		<a href='?menu=articulos&submenu=listado_js_array&nombre=a'  title='Devuelve un array que contiene objetos json'>Listado en json con array de articulos que contiene "a" en su nombre</a> - 
		<a href='?menu=articulos&submenu=listado_xml'>Listado en xml</a> - 
		<a href='?menu=articulos&submenu=listado_xls'>Descargar Listado en excel (.xls)</a>
		 - 
		<a href='?menu=articulos&submenu=listado_pdf'>Descargar pdf</a>-->
	</p>
	<table border='2' >
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Direccion</th>
                <th>Fecha de Alta </th>
                <th>Sueldo en €</th>
                <th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($datos['filas'] as $fila)
			{
               $sueldo = \core\Conversiones::decimal_punto_a_coma($fila['sueldo']);
                
				echo "
					<tr>
						<td>{$fila['nombre']}</td>
						<td>{$fila['apellidos']}</td>
                        <td>{$fila['direccion']}</td>
                        <td>{$fila['fecha_alta']}</td>
                        <td>$sueldo</td>
						<td>
					".\core\HTML_Tag::a_boton_onclick("boton", array("empleados", "form_modificar", $fila['id']), "  modificar  ")
//							<a class='boton' href='?menu={$datos['controlador_clase']}&submenu=form_modificar&id={$fila['id']}' >modificar</a>
                               
					.\core\HTML_Tag::a_boton_onclick("boton", array("empleados", "form_borrar", $fila['id']), "  borrar  ").
//							<a class='boton' href='?menu={$datos['controlador_clase']}&submenu=form_borrar&id={$fila['id']}' >borrar</a>
						"</td>
					</tr>
					";
			}
			echo "
				<tr>
					<td colspan='5'></td>
						<td>"
			.\core\HTML_Tag::a_boton("boton", array("empleados", "form_insertar"), "insertar").
					"</td>
				</tr>
			";
			?>
		</tbody>
	</table>
</div>
