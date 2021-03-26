<?php
if (!empty($_GET['id'])) {
	$arr = explode('/', $_GET['id']);
	
	if (count($arr) >= 2) {
		$url = 'https://www.paypal.com/donate?business='.$arr[0].'%40rubemail.com&currency_code=USD&amount='.$arr[1].'';
		
		header('Location: '.$url);
		exit;
	}
}