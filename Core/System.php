<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'System/vars.php'; 

	class System{
		public $includer;

		//Constructor Method
		function __construct(){
			$this->includer = new Includer($this);
		}

		//Returns the root Based on Server
		public function root(){
			$url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$pieces = explode("/", $url);
			return "/".$pieces[1]."/".((func_num_args())?func_get_arg(0):"");
		}

		//Returns the relative path to root
		public function relativeRoot(String $current_dir){

		}

		//Returns the System Full Path to the Root
		public function systemRoot(){
			return $_SERVER['DOCUMENT_ROOT'].substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
		}

		//Include an Image
		public function includeImg(String $name){
			$url = $this->root();

			$last_dot = "";

			$extension = "png";

			return $url."Imgs/Site/".$extension."/".$name;
		}

		//Cria um Src com uma imagemm
		public function srcImg(String $img_name){
			echo "src='".$this->includeImg($img_name)."'";
		}

		//Cria um Href a partir do Root com o Caminho
		public function hrefRoot(){
			echo "href='".$this->root().((func_num_args())?func_get_arg(0)."'":"'");
		}

		//Cria Href com o Caminho
		public function href($path){
			echo "href='".$path."'";
		}

		public function meta(){
			//Imprimir Base da META
			echo "<meta charset='utf-8'>\n";
			echo "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>\n";

			if(func_num_args()){
				if(func_get_arg(0) == META_COMPLEX){
					//Imprimir META Complexa
				}
			}
		}

		public function session(){
			//Load the Session
			if(func_num_args()==0){
				if(session_status() == PHP_SESSION_NONE){
					session_start();
				}
			}else{ //Load a Data from Session
				$arg = func_get_arg(0);

				//If is in Return Mode
				if(func_num_args()>1){
					if(func_get_arg(1)==true){
						return $_SESSION[$arg];
					}
				//If is in Echo Mode
				}else echo $_SESSION[$arg];
			}
		}
	}