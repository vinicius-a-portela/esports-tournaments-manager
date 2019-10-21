<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'System/vars.php';

	class Includer{

		public $super;

		function __construct(System $object){
			$this->super = $object;
		}

		public function all(){
			$url = $this->super->root();

			//BootStrap CSS
			$this->bootstrapCSS();

			//JQuery
			$this->js();

			return $this->super;
		}

		//Include Only Bootstrap CSS
		public function bootstrapCSS(){
			$url = $this->super->root();

			echo "<link href='https://fonts.googleapis.com/css?family=Roboto&display=swap' rel='stylesheet'>\n";
			echo "<link rel='stylesheet' href='".$url."dependencies/bootstrapmaterial/css/bootstrap-material-design.css'>\n";

			return $this->super;
		}

		public function bootstrapJS(){
			$url = $this->super->root();
			echo "<script src='".$url."Dependencies/BootstrapMaterial/js/bootstrap-material-design.min.js'></script>\n";
			return $this->super;
		}

		public function js(){
			$url = $this->super->root();
			if(!func_num_args()){
				//JQuery
				echo "<script src='".$url."Dependencies/JQuery/jquery-3.4.1.min.js'></script>\n";

				//Popper
				echo "<script src='".$url."Dependencies/Popper/popper.js'></script>\n";

				//BootStrap JS
				echo "<script src='".$url."Dependencies/BootstrapMaterial/js/bootstrap-material-design.min.js'></script>\n";

				//Active Material Design
				echo "<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>\n";
				
				return $this->super;
			}else{
				echo "<script src='".$url."JS/".func_get_arg(0).".js'></script>\n";
			}
		}

		public function navbar(){
			$url = $this->super->root();
			include($_SERVER['DOCUMENT_ROOT'].$url.'Template/navbar.php');
			return $this->super;
		}

		public function footer(){
			$url = $this->super->root();
			include($_SERVER['DOCUMENT_ROOT'].$url.'Template/footer.php');
			return $this->super;
		}

		public function adm_bar(){
			$url = $this->super->root();
			include($_SERVER['DOCUMENT_ROOT'].$url.'Template/adm_bar.php');
			return $this->super;
		}

		public function img(){
			$path = func_get_arg(0);
			$return = "src='".$this->super->root()."Imgs/Site/".$path."'";
			if(func_num_args()>1){
				if(func_get_arg(1) == true)
					return $return;
			}else echo $return;
		}

		public function core(){
			//Get the File to Load and Create the URL
			$file = func_get_arg(0);
			$url = $this->super->systemRoot()."System/".$file.".php";
			
			//Work With Flags
			if(func_num_args()>1){
				$flags = func_get_arg(1);

				//IF is to return just the Name of the core file
				if(array_search(NAME_ONLY, $flags) !== false){
					//If is to return the Root or SystemRoot
					if(array_search(ROOT_PATH, $flags) !== false){
						//Return the 
						return $this->super->root()."System/".$file.".php";
					}else{
						//Return the 
						return $url;
					}
				}
			} else include_once $url; //If has no Flags
		}

		public function template($file){
			include $this->super->systemRoot()."Template/".$file.".php";
		}
	}