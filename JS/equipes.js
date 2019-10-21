function entrarEquipe(){
	$("#equipes").html(`
			<div class='row'>
				<h6>
					<button style='background-color: transparent; border:none;' onclick='voltar()''><img src='`+system.root()+`Imgs/Site/svg/back.svg' width='15'></button>
					Procurar Time:
				</h6>
			</div>
			
			<div class='container'>
				<div class='row'>
					<input id='busca-input' class='form-control' style='display:block;width:85%;' type='text'>
					<button id='busca-b' style='background-color: transparent;border: none;'>
						<img src='`+system.root()+`Imgs/Site/svg/search.svg' width='20' onclick='search()'>
					</button>
				</div>
			</div>
			
			<div id='busca'></div>
			<div id='result' class='text-center'></div>`);

	var input = document.getElementById("busca-input");
	input.addEventListener("keyup", function(event){
		if(event.keyCode == 13){
			search();
		}
	});
}
	
function criarEquipe(){
	$("#equipes").html(`
							<h6>
								<button style='background-color: transparent;border:none;'' onclick='voltar()''><img src='`+system.root()+`Imgs/Site/svg/back.svg' width='15'></button>
								Criar Equipe
							</h6>
							<form method='POST' action='`+system.root()+`System/addequipe.php' enctype='multipart/form-data'>
							  <div class='form-group'>
							    <label for='input-nome'>Nome da Equipe</label>
							    <input type='text' class='form-control' id='input-nome' placeholder='Adicione o nome da equipe' name='nomeequipe' required>
							    <small id='input-nome' class='form-text text-muted'>O nome da equipe não pode conter nenhuma palavra ou significado ofensivo</small>
							  </div>
							  <div class='form-group'>
						      <label for='input-mod'>Modalidade</label>
						      <select class='form-control' id='input-mod' name='modalidade'>
						      </select>
						    </div>
						    <div class='form-group'>
					        <label for='input-logo'>Logo da Equipe (Não é obrigatório)<br>
									<img src='`+system.root()+`Imgs/Site/png/default_team.png' width='125' id='LogoTeam'></label>
					        <input type='file' class='form-control-file' name='teamlogo' id='input-logo'>
					      </div>
					      <input type='hidden' name='id' value=`+ $("#get_id").val() +`>
							  <button type='submit' class='btn btn-raised btn-primary'>Criar Equipe</button>
							</form>`);
	addLogoListener();
	addSelects();
}

function voltar(){
	$('#equipes').html(`\
			<button class='btn btn-raised btn-primary' onclick='entrarEquipe()'>Entrar para uma Equipe</button>
			<button class='btn btn-raised btn-primary' onclick='criarEquipe()'>Criar uma Equipe</button>`);
}

function addLogoListener(){
	$("#input-logo").change(function(){
		readURL(this);
	});
}


function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#LogoTeam').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

function addSelects(){
	let finalT = "";

	if($('#get_cs').val()==1 && $('#hasTeam_cs').val()==0){
		finalT += "<option value='cs'>Counter Strike</option>";
	}
	if($('#get_ff').val()==1 && $('#hasTeam_ff').val()==0){
		finalT += "<option value='ff'>Free Fire</option>";
	}

	$("#input-mod").html(finalT);
}

async function QuantJogadores(equipeParam){
	var data2 = 1;
	await $.post(system.root()+"System/search_equipe_jogadores.php",{equipe: equipeParam})
	.done(function(data){
		data2 = data;
	})
	.fail(function(){alert("Erro ao realizar pesquisa")});

	return data2;
}

async function search(){
	let searching = $("#busca-input").val();
	$("#result").html(`
		<div class='spinner-border mt-3' role='status'>
  		<span class='sr-only'>Loading...</span>
		</div>`);

	$.post(system.root()+"System/search.php",{search: searching})
		.done(async function(data){
			let equipes = data.split(";");

			$("#result").html("");

			for(let i=0;i<equipes.length-1;i++){
				dados = equipes[i].split(",");
				let jogadores = await QuantJogadores(dados[0]);
				let HTML = `
						<div class='card mt-3 text-left'>
							<div class='card-body'>
								<div class='row'>
									<div class='col'>`+dados[1]+` (`+((dados[2]=='cs')?'Counter Strike':'Free Fire')+`)</div>
									<div class='col text-center'>`+jogadores+"/"+((dados[2]=='cs')?'5':'4')+`</div>
									<div class='col'><button class='btn btn-raised btn-primary' id='enter-`+dados[0]+`' onclick='enter(`+dados[0]+`)'>Pedir para Entrar</button></div>
								</div>
							</div>
						</div>`;
				$("#result").append(HTML);
			}
		})
		.fail(function(){alert("Erro ao realizar pesquisa")});
	}

	function enter(enter_id){
		let jog_id = $("#get_id").val();

		$.post(system.root()+"System/requisitar.php",{equipe: enter_id, jogador: jog_id})
			.done(function(data){
				let equipes = data.split(";");

				if(data == 'ok'){
					$("#result").html("<div class='alert alert-success mt-3'>Pedido Enviado Com Sucesso</div>");
				}else if (data == 'exists'){
					$("#result").html("<div class='alert alert-danger mt-3'>Já foi requisitado a entrada para esse time!</div>");
				}else $("#result").html("<div class='alert alert-danger mt-3'>"+data+"</div>");

			})
			.fail(function(){alert("Erro ao realizar pesquisa")});
	}

	function deny(myID){
		$.post(system.root()+"System/deny.php",{id: myID})
		.done(function(data){
			if(data == 'ok'){
				$("#toast-main").attr("style","position: fixed; bottom: 15px; right: 15px;");
				$("#toast-content").attr("style","background-color: #f46b42;color:white");
				$("#toast-content").html("Usuário Rejeitado");
				$('#toast-b').click();
				$("#user-"+myID).remove();
				setTimeout(function(){ /*$("#toast-b").attr("style","position: fixed; bottom: -50px; right: -50px;");*/ }, 5000);
			}else alert('Erro ao executar a ação');
		})
		.fail(function(){alert('Erro ao executar a ação')});
	}

	function accept(myID){
		$.post(system.root()+"System/accept.php",{id: myID})
		.done(function(data){
			if(data == 'ok'){
				$("#toast-main").attr("style","position: fixed; bottom: 15px; right: 15px;");
				$("#toast-content").attr("style","background-color: #28a745;color:white");
				$("#toast-content").html("Usuário Adicionado ao Time");
				$("#toast-b").click();
				$("#user-"+myID).remove();
				setTimeout(function(){ /*$("#toast-b").attr("style","position: fixed; bottom: -50px; right: -50px;");*/ }, 5000);
			}else alert('Erro ao executar a ação');
		})
		.fail(function(){alert('Erro ao executar a ação')});
	}

	function sair(jogadorParam, equipeParam){
		$.post(system.root()+"System/sair.php",{jogador: jogadorParam, equipe: equipeParam})
		.done(function(data){
			if(data == 'ok'){
				$("#toast-main").attr("style","position: fixed; bottom: 15px; right: 15px;");
				$("#toast-content").attr("style","background-color: #f46b42;color:white");
				$("#toast-content").html("Você saiu da Equipe");
				$('#toast-b').click();
				location.reload();
				setTimeout(function(){ /*$("#toast-main").attr("style","position: fixed; bottom: -50px; right: -50px;");*/ }, 5000);
			}else alert('Erro ao executar a ação');
		})
		.fail(function(){alert('Erro ao executar a ação')});
	}