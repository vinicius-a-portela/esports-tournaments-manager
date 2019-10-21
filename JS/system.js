class System{

	root(){
		let url = window.location.pathname;
		let arr = url.split("/");
		return "/"+arr[1]+"/";
	}

	relativeRoot(){

	}

	systemRoot(){

	}

}

var system = new System();