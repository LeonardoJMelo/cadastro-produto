<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="../../skin/css/style.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 		<script src="../../skin/js/functions-cadastro-produtos.js"></script>
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></link>
	</head>
	<body>
		<header class="header-principal">
		</header>
		<section class="box-conteudo-principal">
			<div class="container">
				<header class="header-form">
					<h1>Cadastro de produtos</h1>
				</header>
				<form id="FORM_CADASTRO_PRODUTO" method="POST">
					<div class="row form-group">
						<div class="col-sm-4">
							<input type="text" id="COD_PRODUTO" class="form-control" name="COD_PRODUTO" placeholder="Digite o código do produto"/>
						</div>
					</div>	
					<div class="row form-group">
						<div class="col-sm-4">
							<input type="text" id="DESCRICAO" class="form-control" name="DESCRICAO" placeholder="Digite a descrição do produto"/>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-4">
							<input type="number" id="QUANTIDADE" class="form-control" name="QUANTIDADE" placeholder="Digite a quantidade do produto"/>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-4">
							<input type="text" id="PRECO"  class="form-control" name="PRECO" placeholder="Digite o preço do produto"/>
						</div>
					</div>
						<p>
							<input type="submit" id="SALVAR"  class="container-btn-adicionar" name="SALVAR" data-tipoform="CADASTRO_PRODUTO" value="SALVAR"/>
						</p>
					</div>
				</form>
			</div>	
		</section>	
	</body>
</html>
