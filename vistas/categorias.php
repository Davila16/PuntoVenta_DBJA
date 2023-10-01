<?php
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Categorias</title>
		<?php require_once "menu.php"; ?>
		<style>
			body {
				background-image: url("../img/ini.jpg");
				background-size: cover;
				background-repeat: no-repeat;
			}
			.imagen-descripcion {
				text-align: center;
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<h1></h1>
			<div class="row">
				<div class="col-sm-2">
					<form id="frmCategorias">
						<label>Categoria</label>
						<input type="text" class="form-control input-sm" name="categoria" id="categoria">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaCategoria">Agregar</span>
					</form>
				</div>
				<div class="col-sm-4">
					<div id="tablaCategoriaLoad"></div>
				</div>
				<div class="col-sm-4 justify-content-end" style="position: absolute; right: 120px;">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="imagen-descripcion text-center">
                <img src="../img/ftb.gif" class="img-fluid" alt="Imagen 1" width="120" height="120">
                <p class="font-weight-bold">Futbol</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="imagen-descripcion text-center">
                <img src="../img/sk.gif" class="img-fluid" alt="Imagen 2" width="120" height="120">
                <p class="font-weight-bold">Skate</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="imagen-descripcion text-center">
                <img src="../img/basket.gif" class="img-fluid" alt="Imagen 3" width="120" height="120">
                <p class="font-weight-bold">Basketball</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="imagen-descripcion text-center">
                <img src="../img/rr.gif" class="img-fluid" alt="Imagen 4" width="120" height="120">
                <p class="font-weight-bold">Running</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="imagen-descripcion text-center">
                <img src="../img/bx.gif" class="img-fluid" alt="Imagen 5" width="120" height="120">
                <p class="font-weight-bold">Boxeo</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="imagen-descripcion text-center">
                <img src="../img/gym.gif" class="img-fluid" alt="Imagen 6" width="120" height="120">
                <p class="font-weight-bold">Gimnasio</p>
            </div>
        </div>
    </div>
</div>
		</div>
		<div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza categorias</h4>
					</div>
					<div class="modal-body">
						<form id="frmCategoriaU">
							<input type="text" hidden="" id="idcategoria" name="idcategoria">
							<label>Categoria</label>
							<input type="text" id="categoriaU" name="categoriaU" class="form-control input-sm">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaCategoria" class="btn btn-warning"
							data-dismiss="modal">Guardar</button>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
			$('#btnAgregaCategoria').click(function(){
				vacios=validarFormVacio('frmCategorias');
				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}
				datos=$('#frmCategorias').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/categorias/agregaCategoria.php",
					success:function(r){
						if(r==1){
					$('#frmCategorias')[0].reset();
					$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
					alertify.success("Categoria agregada con exito :D");
				}else{
					alertify.error("No se pudo agregar categoria");
				}
			}
		});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaCategoria').click(function(){
				datos=$('#frmCategoriaU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/categorias/actualizaCategoria.php",
					success:function(r){
						if(r==1){
							$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
							alertify.success("Actualizado con exito :)");
						}else{
							alertify.error("no se pudo actaulizar :(");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaDato(idCategoria,categoria){
			$('#idcategoria').val(idCategoria);
			$('#categoriaU').val(categoria);
		}
		function eliminaCategoria(idcategoria){
			alertify.confirm('¿Desea eliminar esta categoria?', function(){ 
				$.ajax({
					type:"POST",
					data:"idcategoria=" + idcategoria,
					url:"../procesos/categorias/eliminarCategoria.php",
					success:function(r){
						if(r==1){
							$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>