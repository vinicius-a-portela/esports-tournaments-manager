<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

	require $system->includer->core('conexao', [NAME_ONLY]);

	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}

	$sql = 'SELECT * FROM `equipecontas` WHERE `equipecontas`.`conta` = '.$_SESSION['ID'];
	$query = mysqli_query($con, $sql) or die(mysqli_error($con));
	$myTeams = mysqli_fetch_all($query);
	
	$sql = 'SELECT * FROM `equipes`';
	$query = mysqli_query($con, $sql) or die(mysqli_error($con));
	$arr = mysqli_fetch_all($query);
	$new_arr = [];

	//Passa por cada Equipe do Usuário
	for($j=0;$j<sizeof($myTeams);$j++){
		//Passa por todas as Equipes
		for($i=0;$i<sizeof($arr);$i++){
			if($arr[$i][0] == $myTeams[$j][1]){
				array_push($new_arr, $arr[$i]);
			}
		}
	}

	$_SESSION['arr'] = $new_arr;
	$cs = $_SESSION['CS'];
	$ff = $_SESSION['FF'];

	$sql = "SELECT * FROM `requisicoes`";
	$query = mysqli_query($con, $sql) or die(mysqli_error($con));
	$requisicoes = mysqli_fetch_all($query);
	$_SESSION['requisicoes'] = $requisicoes;

	function hasTeam($modalidade){
		$total = 0;

		$arr = $_SESSION['arr'];
		$teams = sizeof($arr);

		if($modalidade == 'cs'){

			for($i=0;$i<$teams;$i++)
				$arr[$i][2]=='cs'?$total++:$total;
			return $total>0?true:false;

		}else if($modalidade == 'ff'){
			
			for($i=0;$i<$teams;$i++)
				$arr[$i][2]=='ff'?$total++:$total;
			return $total>0?true:false;

		}
	}

	function needsTeam(){
		$text = "";
		$modalidades = 0;
		$mods = [
			'cs' => false,
			'ff' => false
		];

		if($_SESSION['CS']==1){
			if(!hasTeam('cs')){
				$mods['cs'] = true;
				$modalidades++;
			}
		}
		if($_SESSION['FF']==1){
			if(!hasTeam('ff')){
				$mods['ff'] = true;
				$modalidades++;
			}
		}

		switch ($modalidades) {
			case 0:
				$text = "Nenhum";
				break;

			case 1:
				$text = ($mods['cs'])?"Counter Strike":"Free Fire";
				break;
			
			case 2:
				$text = "Counter Strike e Free Fire";
				break;
		}

		return $text;
	}

	function alreadyInTeam(){
		$modalidades = 0;
		$mods = [
			'cs' => false,
			'ff' => false
		];

		if($_SESSION['CS']==1){
			$modalidades++;
			$mods['cs'] = true;
		}
		if($_SESSION['FF']==1){
			$modalidades++;
			$mods['ff'] = true;
		}

		switch ($modalidades) {
			case 0:
				return false;
				break;

			case 1:
				$modalidade = ($mods['cs'])?"cs":"ff";
				return hasTeam($modalidade);
				break;
			
			case 2:
				if(hasTeam('cs') AND hasTeam('ff')) return true; else return false;
				break;
		}
		
	}

	function teams(){
		return sizeof($_SESSION['arr']);
	}

	function team($id){
		$system = $GLOBALS['system'];
		$arr = $_SESSION['arr'];
		$requisicoes = $_SESSION['requisicoes'];

		?>
		<button class="btn btn-raised btn-danger float-right" onclick=<?php echo "'sair(".$_SESSION['ID'].",".$arr[$id][0].")'" ?>>Sair da Equipe</button>
		<h6><?php echo $arr[$id][1]?> | <?php echo ($arr[$id][2])=="cs"?"Counter Strike":"Free Fire" ?> </h6>
		<?php if($arr[$id][4]!=null){
			echo "<img src='".$system->root()."Imgs/".$arr[$id][4]."' width='125'><br>";
		}?>
		Capitão: <?php echo ownerOf($arr[$id][3])?>
		<?php
			membros($id);
			if(ownerOf($arr[$id][3]) == $_SESSION['nome']){
				for($i=0;$i<sizeof($requisicoes);$i++){
					if($requisicoes[$i][2] == $arr[$id][0]){
		?>
			<div class="alert alert-dark" id=<?php echo "user-".$requisicoes[$i][0] ?>>
				Requisição de <b><?php echo nameOf($requisicoes[$i][1])?></b> para entrar no seu time
				<button class="btn btn-raised btn-danger ml-2" style="float:right;" onclick=<?php echo "deny(".$requisicoes[$i][0].")"?>>Rejeitar</button>
				<button class="btn btn-raised btn-success ml-2" style="float:right;" onclick=<?php echo "accept(".$requisicoes[$i][0].")"?>>Aceitar</button>
			</div>
		<?php
					}
				}
			}
		?>
		<hr>
		<?php
	}

	function membros($id){
		include 'conexao.php';
		$arr = $_SESSION['arr'];
		$outro = $arr[$id][0];
		$sql = "SELECT * from `equipecontas` WHERE `equipecontas`.`equipe` = '$outro'";
		$query = mysqli_query($con, $sql) or die("<h1>Erro ao conectar ao banco de dados</h1>");
		
		echo "<br><h7>Membros:</h7><br>";
		while($row = mysqli_fetch_array($query)){
			echo "<span style='font-size: 13px'>".nameOf($row['conta'])."</span><br>";
		}
	}

	function ownerOf($id){
		include 'conexao.php';
		$sql = "SELECT * from `contas` WHERE `contas`.`id` = '$id'";
		$query = mysqli_query($con, $sql);
		if($query){
			return ($row = mysqli_fetch_array($query))?$row['nome']:null;
		}else echo mysqi_error($con);
	}

	function nameOf($id){
		include 'conexao.php';
		$sql = "SELECT * from `contas` WHERE `contas`.`id` = '$id'";
		$query = mysqli_query($con, $sql);
		if($query){
			return ($row = mysqli_fetch_array($query))?$row['nome']:null;
		}else echo mysqi_error($con);
	}