<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://cevicherias.informaticapp.com/usuarios',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => 
		'usu_nombres='.$_POST["usu_nombres"].
		'&usu_apellidos='.$_POST["usu_apellidos"].
		'&usu_usuario='.$_POST["usu_usuario"].
		'&usu_clave='.$_POST["usu_clave"].
		'&tiad_id='.$_POST["tiad_id"].
		'&empr_id='.$_POST["empr_id"].
		'&sucu_id='.$_POST["sucu_id"],
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/x-www-form-urlencoded',
			'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VxWmE4ZEtVREUxZFl5VmJsSDhEbDRuMllIaFkzYktTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRVJZdDJTL3FVM1VETFl6dTBaZmRvM3BtLmUzampBaQ=='
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$data = json_decode($response, true);
		var_dump($data);
		//header("Location: usuario_html.php");
	}else{
		/* tabla relacionada*/
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://cevicherias.informaticapp.com/TipoAdmin',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VxWmE4ZEtVREUxZFl5VmJsSDhEbDRuMllIaFkzYktTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRVJZdDJTL3FVM1VETFl6dTBaZmRvM3BtLmUzampBaQ=='
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$tipoAdmin = json_decode($response, true);

		/* tabla relacionada*/
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://cevicherias.informaticapp.com/empresa',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VxWmE4ZEtVREUxZFl5VmJsSDhEbDRuMllIaFkzYktTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRVJZdDJTL3FVM1VETFl6dTBaZmRvM3BtLmUzampBaQ=='
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$empresa = json_decode($response, true);

		/* tabla relacionada*/
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://cevicherias.informaticapp.com/sucursal',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VxWmE4ZEtVREUxZFl5VmJsSDhEbDRuMllIaFkzYktTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRVJZdDJTL3FVM1VETFl6dTBaZmRvM3BtLmUzampBaQ=='
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$sucursal = json_decode($response, true);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Usuarios</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link href="../../css/styles.css" rel="stylesheet" />
	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
       

			<!-- TABLA -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Registrar usuario</h1>
                        <div class="card mb-4">
                            <div class="card-body">

                                <form method="post">
                                    
									<div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Nombres</label>
                                        <input type="text" name="usu_nombres"class="form-control">
                                    </div>
									<div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Apellidos</label>
                                        <input type="text" name="usu_apellidos"class="form-control">
                                    </div>
									<div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Usuario</label>
                                        <input type="text" name="usu_usuario" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"  class="form-label">Clave</label>
                                        <input type="text" name="usu_clave" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Asignar tipo admin</label>
                                        <select name="tiad_id" class="form-select form-select-sm" aria-label=".form-select-sm example" >
											<?php foreach($tipoAdmin["Detalles"] as $TipoAdmin):?>	
											<option type="text" value="<?=$TipoAdmin["tiad_id"]?>"><?= $TipoAdmin["tiad_nombre"] ?></option>
											<?php endforeach?>
										</select>
                                    </div>

									<div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Asignar empresa</label>
                                        <select name="empr_id" class="form-select form-select-sm" aria-label=".form-select-sm example" >
											<?php foreach($empresa["Detalles"] as $empresas):?>	
											<option type="text" value="<?=$empresas["empr_id"]?>"><?= $empresas["empr_nombre"] ?></option>
											<?php endforeach?>
										</select>
                                    </div>

									<div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Asignar Sucursal</label>
                                        <select name="sucu_id" class="form-select form-select-sm" aria-label=".form-select-sm example" >
											<?php foreach($sucursal["Detalles"] as $sucursales):?>	
											<option type="text" value="<?=$sucursales["sucu_id"]?>"><?= $sucursales["sucu_nombre"] ?></option>
											<?php endforeach?>
										</select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                    <a href="empresa_html.php" class="btn btn-danger">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script>
    </body>
</html>