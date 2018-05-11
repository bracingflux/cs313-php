<?php 
	class Hat {
		public $name;
		public $price;
		public $description;
		public $photo;
	}

	$hats = Array();

	$file = fopen("hatsInfo.txt", "r");
	if ($file) {
		while (($line = fgets($file)) !== false) {
			$hat = new Hat();
			$hat->name = $line;

			if (($line = fgets($file)) !== false) {
				$hat->description = $line;
			}

			if (($line = fgets($file)) !== false) {
				$hat->price = $line;
			}

			array_push($hats, $hat);
			
		}
		fclose($file);
	}
	else {
		echo "Error while reading from hatsInfo.txt";
	} 
 ?>