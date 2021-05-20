<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Декоративная художественная ковка элементов и изделий");
$APPLICATION->SetPageProperty("keywords", "Декоративная художественная ковка элементов и изделий");
$APPLICATION->SetPageProperty("title", "Декоративная художественная ковка элементов и изделий");
$APPLICATION->SetTitle("Декоративная ");
?>
<?if(isset($_GET["LIST"]) && !empty($_GET["LIST"]))
{
	$_SESSION["LIST_VIEW"]=$_GET["LIST"];
}
if(isset($_GET["NUMBER"]) && !empty($_GET["NUMBER"]))
{
	$number=$_GET["NUMBER"];
	if($number=="ALL")
	{
		$number=16;
	}
	$_SESSION["NUMBER"]=$number;
}
if(isset($_SESSION["NUMBER"]) && !empty($_SESSION["NUMBER"]))
{
	$number=$_SESSION["NUMBER"];
}
else
{
	$number=16;
}
$sort="sort";
$sort_to="DESC";
if(isset($_GET["sort"]) && !empty($_GET["sort"]))
{
	$sort_arr=explode("-", $_GET["sort"]);
	$sort=$sort_arr[0];
	$sort_to=$sort_arr[1];
}?>
<?



if(isset($_GET["SHOW"]) && !empty($_GET["SHOW"]))
{
    $GLOBALS["BY_LINK"]="Y";
    switch($_GET["SHOW"])
    {
        case "NEW":
            $GLOBALS["arrFilter"]["PROPERTY_NEW_VALUE"]="да";
            $APPLICATION->SetTitle("Новинки");
            break;
		case "NEW_RAZDEL":
			if(empty($_GET["sort"])){
				$sort = "PROPERTY_SORT_CAT_RASP";
				$sort_to = "asc,nulls";
			}
            $GLOBALS["arrFilter"]["PROPERTY_NEW_RAZDEL_VALUE"]="да";
            $APPLICATION->SetTitle(tplvar('name_2'));
            break;
        case "LIDER":
            $GLOBALS["arrFilter"]["PROPERTY_LIDER_VALUE"]="да";
            $APPLICATION->SetTitle("Популярные товары");
            break;
        case "SPEC":
            $GLOBALS["arrFilter"]["PROPERTY_SPEC_VALUE"]="да";
            $APPLICATION->SetTitle("Товары со специальной ценой");
            break;
		 case "SPEC_RAZDEL":
		 if(empty($_GET["sort"])){
			$sort = "PROPERTY_SORT_CAT";
			$sort_to = "asc,nulls";
		 }
            $GLOBALS["arrFilter"]["PROPERTY_SPEC_RAZDEL_VALUE"]="да";
            $APPLICATION->SetTitle(tplvar('name_1'));
            break;
        default:$APPLICATION->SetTitle("Фильтр по товарам");
    }

}
else
{
    $APPLICATION->SetTitle("Каталог товаров");
    $GLOBALS["BY_LINK"]="N";
}




?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog",
	"my_catalog",
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "21",
		"HIDE_NOT_AVAILABLE" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/catalog/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "NAIMENOVANIE_SAYT",
			1 => "NAIMENOVANIE_SAYT02",
			2 => "SPOSOB_IZGOTOVLENIYA",
			3 => "CML2_BAR_CODE",
			4 => "CML2_ARTICLE",
			5 => "MATERIAL_IZGOTOVLENIYA",
			6 => "NAIMENOVANIE_SAYT03",
			7 => "CML2_ATTRIBUTES",
			8 => "CML2_TRAITS",
			9 => "TITLE_SECTION",
			10 => "CML2_BASE_UNIT",
			11 => "WINDOWS_TITLE",
			12 => "NEW_RAZDEL",
			13 => "COUNT_RATE",
			14 => "SPEC_PRICE",
			15 => "SPEC_RAZDEL",
			16 => "CML2_TAXES",
			17 => "CML2_MANUFACTURER",
			18 => "WIDTH",
			19 => "HEIGHT",
			20 => "LENGTH",
			21 => "MATERIAL",
			22 => "SAME",
			23 => "NEW",
			24 => "LIDER",
			25 => "SPEC",
			26 => "NAIMENOVANIE_SAYT03",
			27 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "Реализация Ковка",
		),
		"FILTER_VIEW_MODE" => "VERTICAL",
		"USE_REVIEW" => "N",
		"USE_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "Реализация Ковка",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/basket/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_TOP_DEPTH" => "1",
		"SECTIONS_VIEW_MODE" => "LINE",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"PAGE_ELEMENT_COUNT" => $number,
		"LINE_ELEMENT_COUNT" => "3",
		"ELEMENT_SORT_FIELD" => $sort,
		"ELEMENT_SORT_ORDER" => $sort_to,
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"LIST_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "CML2_BASE_UNIT",
			2 => "",
		),
		"INCLUDE_SUBSECTIONS" => "N",
		"LIST_META_KEYWORDS" => "UF_SECTION_TITLE",
		"LIST_META_DESCRIPTION" => "UF_SECTION_TITLE",
		"LIST_BROWSER_TITLE" => "SECTION_META_TITLE",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "WINDOWS_TITLE",
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "5",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "N",
		"USE_STORE" => "N",
		"PAGER_TEMPLATE" => "ehk_all",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"DETAIL_SHOW_MAX_QUANTITY" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_BRAND_USE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE#/",
			"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
