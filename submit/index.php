<?php
	echo "Please wait while processing...";
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	$w = true;
	while ($w) {
		$ran = generateRandomString(20);
		if (!file_exists("../pastes/" . $ran . ".txt")) {
			$w = false;

			$file = fopen("../pastes/" . $ran . ".txt","w");
			fwrite($file, $_POST["text"]);
			fclose($file);

			 
			echo '<meta http-equiv="refresh" content="1; URL=../view/?id=' . $ran . '" />';
		}
	}
?>