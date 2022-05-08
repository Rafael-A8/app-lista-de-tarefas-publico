<?php
	$acao = 'recuperar';
	require 'tarefa-controller.php';
/*
	echo '<pre>';
	print_r($tarefas);
	echo '</pre>';	
*/
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script>
			function editar(id, txt_tarefa) {
				// oque irei fazer

				// criar um form de edição
				let form = document.createElement('form')
				form.action = '#'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada do texto
				let inputtarefa = document.createElement('input')
				inputtarefa.type = 'text'
				inputtarefa.name = 'tarefa'
				inputtarefa.className = ' col-9 form-control'
				inputtarefa.value = txt_tarefa // dessa forma os valores vao ficar dentro da caixa.

				//criando um imput hidden para guardar o id da tarefa
				let inputid = document.createElement('input')
				inputid.type = 'hidden'
				inputid.name = 'id'
				inputid.value = id

				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = ' col-3 btn btn-info'
				button.innerHTML = 'Atualizar'

				//incluindo inputtarefa no form
				form.appendChild(inputtarefa)

				//incluindo inputid no form
				form.appendChild(inputid)

				//incluindo o button no form
				form.appendChild(button)

				//teste
				//console.log(form)

				//alert(id)

				let tarefa = document.getElementById('tarefa_'+id)

				//limpando o texto da tarefa para poder incluir o form
				tarefa.innerHTML = ''

				//incluindo o form criado na página
				tarefa.insertBefore(form, tarefa[0])

			}
		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>							
								<hr />
								<?php foreach($tarefas as $indice => $tarefa) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
											<?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger"></i>
											<i class="fas fa-edit fa-lg text-info" 
												onclick="editar
													(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')">
											</i>
											<i class="fas fa-check-square fa-lg text-success"></i>
									</div>
								</div>

								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>