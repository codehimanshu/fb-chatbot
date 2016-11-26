<?php
	file_put_contents("fb.txt", file_get_contents("php://input"));
	$fb = file_get_contents("fb.txt");
	echo $fb;
?>