<?php
	$return = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'],"/",1)+1);
  require $_SERVER['DOCUMENT_ROOT'].$return.'autoload.php';

  $system->includer->bootstrapCSS();
?>
<button type="button" class="btn btn-raised btn-primary">Primary</button>

<?php 
	$system->includer->js();
?>