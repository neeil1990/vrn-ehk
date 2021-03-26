<?php
if (!empty($_GET['id'])) {
	$arr = explode('/', $_GET['id']);
	
	if (count($arr) >= 3) {
		$url = 'https://qiwi.com/payment/form/99?extra[%27account%27]='.$arr[0].'&extra[%27comment%27]='.$arr[1].'&currency=643&amountInteger='.$arr[2].'&amountFraction=00';
		
		header('Location: '.$url);
		exit;
	}
}