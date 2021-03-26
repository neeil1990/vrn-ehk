<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Художественная ковка. Кованые изделия, декоративные элементы, чугунное литье и элементы художественной ковки купить по низким ценам в Воронеже. Завод художественной ковки и литья «Элементы Художественной Ковки» (ЭХК)");

$discount_price=My::GetMinPrice(8444,1);
var_dump($discount_price['DATA']);



?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>