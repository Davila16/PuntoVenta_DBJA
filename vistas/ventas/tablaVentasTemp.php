<?php 
	session_start();
 ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Hacer Venta</h4>
        <h4><strong><div id="nombreclienteVenta"></div></strong></h4>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-hover table-condensed text-center">
            <caption>
                <span class="btn btn-success" onclick="crearVenta()">
                    Generar Venta <span class="glyphicon glyphicon-usd"></span>
                </span>
            </caption>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Quitar</th>
            </tr>
        </table>
    </div>
</div>

 	<?php 
 	$total=0;
 	$cliente=""; 
 		if(isset($_SESSION['tablaComprasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tablaComprasTemp'] as $key) {

 				$d=explode("||", @$key);
 	 ?>
 	<tr>
 		<td><?php echo $d[1] ?></td>
 		<td><?php echo $d[2] ?></td>
 		<td><?php echo $d[3] ?></td>
 		<td><?php echo 1; ?></td>
 		<td>
 			<span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>
 <?php 
 		$total=$total + $d[3];
 		$i++;
 		$cliente=$d[4];
 	}
 	endif; 
 ?>
 	<tr>
 		<td>Total de venta: <?php echo "$".$total; ?></td>
 	</tr>
 </table>
 <script type="text/javascript">
 	$(document).ready(function(){
 		nombre="<?php echo @$cliente ?>";
 		$('#nombreclienteVenta').text("Nombre de cliente: " + nombre);
 	});
 </script>