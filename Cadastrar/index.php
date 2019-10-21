<?php
  $return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php'; 
?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Cadastro | Jogos Eletrônicos</title>

	<?php $system->meta() ?>
	<?php $system->includer->bootstrapCSS() ?>
</head>

<style type="text/css">
.form-group.required .control-label:after {
  content:"*";
  color:red;
}

body{
	background-color: #ededed;
}

.center{
	display: block;
	margin-left: auto;
	margin-right: auto;
}

.custom_checkbox{
	display: none;
}

.custom_checkbox + label{
    background: url('../imgs/site/svg/star_2.svg') no-repeat;
    height: 16px;
    width: 16px;
    display: inline-block;
    padding: 0px;
}

.custom_checkbox:checked + label{
    background: url('../imgs/site/svg/star_1.svg') no-repeat;
    height: 16px;
    width: 16px;
    display: inline-block;
    padding: 0px;
}
</style>

<body>
	<?php
		$system->includer->navbar();
	?>

	<div class="container">
		<div class="card w-100 mt-5 center" style="max-width: 800px">
		  <div class="card-body">
		    <h5 class="card-title">Cadastrar</h5>
		    <p class="card-text">Cadastre sua conta</p>
		    <form method="POST" action=<?php echo $system->includer->core('cadastro', [NAME_ONLY, ROOT_PATH]) ?>>
			    <h4 class="text-center">Informações de Login</h4>
				  <div class="form-group required">
				    <label for="input-email" class="control-label">Email</label>
				    <input type="email" class="form-control" id="input-email" aria-describedby="emailHelp" placeholder="Insira seu Email" name="email" required>
				  </div>
				  <div class="form-group required">
				    <label for="input-pass" class="control-label">Senha</label>
				    <input type="password" class="form-control" id="input-pass" placeholder="Insira sua senha" name="senha" required>
				  </div>
				  <div class="form-group required">
				    <label for="input-pass-confirm" class="control-label">Confirmar Senha</label>
				    <input type="password" class="form-control" id="input-pass-confirm" placeholder="Insira sua senha" required>
				  </div>
				  
				  <hr class="pb-3 mt-3">
				  <h4 class="text-center">Inscrição nos Jogos Eletrônicos</h4>

				  <div class="form-group required">
				    <label for="input-nome" class="control-label">Nome Completo</label>
				    <input type="text" class="form-control" id="input-nome" placeholder="Insira seu nome completo" name="nome"required>
				  </div>
				  <div class="form-group">
				    <label for="input-nick">Nickname</label>
				    <input type="text" class="form-control" id="input-nick" placeholder="Insira o seu nome dentro do jogo" name="nickname">
				  </div>
				  <div class="form-group required">
				  	<label class="control-label" for="input-inst">Instituição</label>
					  <select class="custom-select form-control" id="input-inst" name="instituicao" required>
					    <option value="ifpa" selected>IFPA</option>
					    <option value="eetepa">EETEPA</option>
					  </select>
				  </div>
				  <div class="form-group required" id="matricula-div">
				  	<label for="input-matricula" class="control-label">Matricula</label>
				    <input type="number" class="form-control" id="input-matricula" placeholder="Insira seu número de matricula" name="matricula" min="11" required>
				  </div>
				  <div class="form-group required" id="turma-div">
				  	<label for="input-turma" class="control-label">Turma</label>
				    <select class="custom-select form-control" id="input-turma" name="turma" required>
				    	<?php
				      	include $system->includer->core('request_cursos', [NAME_ONLY]);
				      ?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label>Modadidades</label>
				    <small class="form-text text-muted">A escolha das modalidades podem mudar até o período final de inscrição.</small>
				  </div>

				  <!-- CLASH ROYALE -->
		      <div class="custom-control custom-checkbox">
		      	<div class="row">
		      		<div class="col">
		      			<input type="checkbox" class="custom-control-input modalidades" id="input-cr" name="cr">
		      			<label class="custom-control-label" for="input-cr">Clash Royale</label>
		      		</div>
		      		<div class="col">
				        <div class="custom-control custom-radio float-right" id="input-cr-fav">
				        </div>
		      		</div>
		      	</div>
		      </div>

		      <!-- COUNTER STRIKE -->
		      <div class="custom-control custom-checkbox">
		      	<div class="row">
		      		<div class="col">
		      			<input type="checkbox" class="custom-control-input modalidades" id="input-cs" name="cs">
		      			<label class="custom-control-label" for="input-cs">Counter Strike</label>
		      		</div>
		      		<div class="col">
				        <div class="custom-control custom-radio float-right" id="input-cs-fav">
				        </div>
		      		</div>
		      	</div>
		      </div>

		      <!-- FIFA 17 -->
		      <div class="custom-control custom-checkbox">
		      	<div class="row">
		      		<div class="col">
		      			<input type="checkbox" class="custom-control-input modalidades" id="input-fifa" name="fifa">
		      			<label class="custom-control-label" for="input-fifa">FIFA 17</label>
		      		</div>
		      		<div class="col">
				        <div class="custom-control custom-radio float-right" id="input-fifa-fav">
				        </div>
		      		</div>
		      	</div>
		      </div>

		      <!-- FREE FIRE -->
		      <div class="custom-control custom-checkbox">
		      	<div class="row">
		      		<div class="col">
		      			<input type="checkbox" class="custom-control-input modalidades" id="input-ff" name="ff">
		      			<label class="custom-control-label" for="input-ff">Free Fire</label>
		      		</div>
		      		<div class="col">
				        <div class="custom-control custom-radio float-right" id="input-ff-fav">
				        </div>
		      		</div>
		      	</div>
		      </div>
					
					<div id="favorite-alert">
						
					</div>

		      <div class="alert alert-danger mt-3" role="alert">
					  <span id="preco-inscricao">Preço da inscrição: R$ 0,00</span>
					</div>

				  <hr style="padding-bottom: 10px; margin-top: 30px">
				  <h4 class="text-center">Informações Adicionais</h4>

				  <div class="form-group">
				    <label for="input-idade">Idade</label>
				    <input type="number" class="form-control" id="input-idade" placeholder="Insira sua idade" name="idade">
				  </div>

				  <div class="form-group">
				    <label for="input-telefone">Telefone</label>
				    <input type="number" class="form-control" id="input-telefone" placeholder="Insira seu número de telefone" name="telefone">
				  </div>
					
					<div class="text-right">
						<button type="submit" class="btn btn-raised btn-primary px-3">Cadastrar</button>
					</div>
				</form>
	  	</div>
		</div>
	</div>

  <?php $system->includer->js()?>
  <?php $system->includer->js('modalidades')?>

  <script type="text/javascript">
  	var turmas = $("#input-turma").html();

  	$("#input-inst").change(function(){
  		if($("#input-inst :selected").val() == 'ifpa'){
  			
  			$("#matricula-div").html("\
  				<label for='input-matricula' class='control-label'>Matricula</label>\
			    <input type='number' class='form-control' id='input-matricula' placeholder='Insira seu número de matricula' name='matricula' min='11' required>");

  			$("#turma-div").html("\
  				<label for='input-turma' class='control-label'>Turma</label>\
				    <select class='custom-select form-control' id='input-turma' name='turma' required>\
				    	"+turmas+"\
				    </select>");

	  	}else if($("#input-inst :selected").val() == 'eetepa'){

	  		$("#matricula-div").html("\
  				<label for='input-cpf' class='control-label'>CPF</label>\
			    <input type='text' class='form-control' id='input-cpf' placeholder='Insira seu CPF' name='cpf' min='11' required>");

	  		$("#turma-div").html("");
	  	}
  	});

  	$("#input-matricula").change(function(){
  		if( ($(this).val()).length == 11 ){
  			let text = $(this).val();

  			let ano = text.substr(0,4);
  			let curso = text.substr(4,3);

  		}
  	});
  </script>
</body>
</html>