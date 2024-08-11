<?php

	//creating file
	
	$myfile = fopen("Computer.txt", "w");
	$context = "open,read,write,and close a file on server ";

	//writing context
	fwrite($myfile, $context);
	fclose($myfile);


	//opening in append mode
	$myfile = fopen("Computer.txt", "a");
	$extra = "Javascript is a widely-used,free,and efficient programming language";
	fwrite($myfile, $extra);
	fclose($myfile);
	count_spaces();
	count_commas();

	function count_spaces(){
		$myfile = fopen("Computer.txt", "r");
		$text = fread($myfile,filesize("Computer.txt"));
		$numSpaces = substr_count($text, ' ');
		echo $numSpaces;
	}

	function count_commas(){
		$myfile = fopen("Computer.txt", "r");
		$text = fread($myfile,filesize("Computer.txt"));
		$numCommas = substr_count($text, ',');
		echo $numCommas;
	}  

?>