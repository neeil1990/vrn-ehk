<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Контактные данные");
$APPLICATION->SetTitle("Контактные данные");
?>
<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/includes/contact_page.php", Array(), Array(
    "MODE"      => "php", 
    "NAME"      => "странцу контактов", 
    "TEMPLATE"  => "contact_page.php" 
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>