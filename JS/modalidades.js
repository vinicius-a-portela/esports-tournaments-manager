//Variáveis
var price;
var quantMods;

//Quando uma das modalidades é selecionada
$('.modalidades').click(function(){
  let id = "#" + $(this).attr('id');
  let modalidade = (arr = id.split("-"))?arr[1]:null;
  let checked = ($(id+":checked").length==0)?false:true;

  //Pegar Quantidade de Modalidades Selecionadas
	quantMods = $('.modalidades:checked').length;

	switch(quantMods){
		case 0:
			price = 0;
      break;
		case 1:
			price = 5 + (2*(quantMods-1));
      break;
		default:
			price = 5 + (2*(quantMods-1));
	}

  //Informar valor de Inscrição ao Usuário
	$("#preco-inscricao").html("Preço da Inscrição: R$ "+price+",00");

  //Modificar Visualização dos favoritos
  if(checked){
    $(id+"-fav").html("\
        <input type='radio' id='radio-"+modalidade+"' name='fav' value="+modalidade+" class='custom_checkbox'>\
        <label for='radio-"+modalidade+"'></label>\
      ");
    $("#radio-"+modalidade).click();
  }else{
    $(id+"-fav").html("");
  }

  //Se Tiver +2 Modalidade, Adiciona Alerta Sobre Favoritos
  if(quantMods >= 2){
    $("#favorite-alert").html("\
    <div class='alert alert-warning mt-3' role='alert'>\
      <span id='alert-modalidade'>Escolha uma modalidade favorita (Clicando na Estrela na parte Direita), este será a preferência na hora de criar as partidas, se houver vaga você será colocado em outras modalidades. Se você não houver vagas em um jogo não será necessário pagar a mais (Pagar 5,00 invés de 7,00)</span>\
    </div>");
  }else{
    $("#favorite-alert").html("");
  }

  //Se Não Tiver Nenhum Radio Selecionado
  if(quantMods > 0)
    if( $(".custom_checkbox:checked").length == 0 ){
      $(".custom_checkbox:nth-child(1)").click();
    }
});