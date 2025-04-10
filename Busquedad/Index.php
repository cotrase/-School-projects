<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="img/ing3.png" sizes="64x64"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Petrona Burger</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
	<style>
		body {
			background: #ffe259;
			background-image: url(img/img2.jpg);
			background-position: center;
			background-attachment: fixed;
			background-size: cover;
			background-repeat: no-repeat;
		}
		.bg {
			max-width: 80em;
			padding: 1.3em;
			margin: 0 auto;
			background-color: whitesmoke;
			font-weight: bold;
			border-radius: 0.5em;
		}
		.bga {
			max-width: 100em;
			padding: 1.5em;
			margin: 0 auto;
			background-color: whitesmoke;
			border-radius: 0.5em;
		}
	</style>
</head>
<body>
<section class="container">
	<div class="row my-5">
		<div class="col-sm-12 col-md-12 col-lg-12 bga">
			<form action="" method="post" class="stylesheet">
				<h3 class="display-5 text-black text-center">LISTADOS DE PEDIDOS</h3>
				<h3 class="display-5 text-black text-center">MENU DEL DIA</h3>
				<div class="mb-3">
					<label>CEDULA DEL CLIENTE(*)</label>
					<input type="text" name="cedula" placeholder="Ingrese Cedula del cliente" maxlength="30" required class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">HAMBURGUESAS</label>
					<select name="hamburguesas" class="form-select" aria-label="Hamburguesas">
						<option selected value="NO">Seleccione una opcion</option>
						<option value="Moncana">Moncana</option>
						<option value="Caribe">Caribe</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">BEBIDAS</label>
					<select name="bebidas" class="form-select" aria-label="Bebidas">
						<option selected value="NO">Seleccione una opcion</option>
						<option value="Te">Té</option>
						<option value="Coca cola">Coca cola</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">ACOMPAÑANTES</label>
					<select name="acompañante" class="form-select" aria-label="Acompañantes">
						<option selected value="NO">Seleccione una opcion</option>
						<option value="Cascos a la francesa">Cascos a la francesa</option>
						<option value="Papas a la francesa">Papas a la francesa</option>
					</select>
				</div>
				<div class="mb-3">
					<button type="submit" class="btn btn-success btn-block" name="registrar">REGISTRAR</button>

		</div>
	</div>
</section>

<?php
session_start();

if (isset($_POST['registrar'])) {
	$pedido = array(
		"hamburguesas" => $_POST["hamburguesas"],
		"bebidas" => $_POST["bebidas"],
		"acompañante" => $_POST["acompañante"],
		"cedula" => $_POST["cedula"]
	);
	$_SESSION['pedidos'][] = $pedido;
}

if (isset($_POST['delete'])) {
	unset($_SESSION['pedidos'][$_POST['key']]);
}
?>

<?php  
if (isset($_SESSION['pedidos'])) {
	foreach ($_SESSION['pedidos'] as $key => $value) {
		$num_pedidos = $key + 1;
?>
	<section class="container-fluid">
		<div class="row my-1">
			<div class="col-sm-12 col-md-12 bg">
				<form action="" method="post" class="stylesheet">
                <input type="text" readonly class="form-control mb-2" value="<?php echo $num_pedidos ?>">
                <input type="text" readonly class="form-control mb-2" value="<?php echo $value['cedula'] ?>">
                <input type="text" readonly class="form-control mb-2" value="<?php echo $value['hamburguesas'] ?>">
                <input type="text" readonly class="form-control mb-2" value="<?php echo $value['bebidas'] ?>">
                <input type="text" readonly class="form-control mb-2" value="<?php echo $value['acompañante'] ?>">

					<input type="hidden" name="key" value="<?php echo $key ?>">
					<button name="delete" class="btn btn-danger">Eliminar</button>
				</form>
			</div>
		</div>
	</section>
<?php
	}
}
?>

<!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">LISTAR PEDIDOS</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<label>CEDULA DEL CLIENTE(*)</label>
					<input type="text" name="cedulas" maxlength="30" class="form-control">
					<br>
					<button type="submit" name="buscar" class="btn btn-primary">BUSCAR</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">CERRAR</button>
			</div>
		</div>
	</div>
</div>

<div class="row my-1">
	<div class="col-sm-12 col-md-12 bga">
		<table id="example" class="table table-striped table-bordered table-hover display responsive nowrap" style="width:100%" cellspacing="0">
			<thead>
				<tr>
					<th>Num Pedido</th>
					<th>Cedula</th>
					<th>Hamburguesa</th>
					<th>Bebidas</th>
					<th>Acompañante</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				if (isset($_SESSION['pedidos'])) {
					foreach ($_SESSION['pedidos'] as $key => $value) {
						$num_pedidos = $key + 1;
				?>
				<tr>
					<td><?php echo $num_pedidos ?></td>
					<td><?php echo $value['cedula'] ?></td>
					<td><?php echo $value['hamburguesas'] ?></td>
					<td><?php echo $value['bebidas'] ?></td>
					<td><?php echo $value['acompañante'] ?></td>
				</tr>
				<?php
					}
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>Num Pedido</th>
					<th>Cedula</th>
					<th>Hamburguesa</th>
					<th>Bebidas</th>
					<th>Acompañante</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#example').DataTable({
			"language": {
				"url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
			}
		});
	});
</script>
</body>
</html>
