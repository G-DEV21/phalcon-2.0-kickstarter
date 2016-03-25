<?php 

use 
	Phalcon\Config
	;

return new Config([
	'Namespaces' => [
		// "Example\Base"    => "vendor/example/base/",
  		// "Example\Adapter" => "vendor/example/adapter/",
  		// "Example"         => "vendor/example/"
	],
	'Prefixes' => [
		// "Example_Base"    => "vendor/example/base/",
  		// "Example_Adapter" => "vendor/example/adapter/",
  		// "Example_"        => "vendor/example/"
	],
	'Dirs' => [ // Registering directories is not recommended in terms of performance. 
		// "library/MyComponent/",
   		// "library/OtherComponent/Other/",
   		// "vendor/example/adapters/",
   		// "vendor/example/"
	],
	'Classes' => [
		// "Some"         => "library/OtherComponent/Other/Some.php",
  		// "Example\Base" => "vendor/example/adapters/Example/BaseClass.php"
	],
]);

?>