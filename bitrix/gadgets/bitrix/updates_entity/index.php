<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arGadgetParams["TEMPLATE_NAME"] = ($arGadgetParams["TEMPLATE_NAME"]?$arGadgetParams["TEMPLATE_NAME"]:"main");
$arGadgetParams["SHOW_TITLE"] = ($arGadgetParams["SHOW_TITLE"]?$arGadgetParams["SHOW_TITLE"]:"N");
$arGadgetParams["GROUP_ID"] = ($arGadgetParams["GROUP_ID"]?$arGadgetParams["GROUP_ID"]:false);

if (!in_array($arGadgetParams["EVENT_ID"], array("system", "forum", "photo", "blog", "tasks", "files", "calendar")))
	$arGadgetParams["EVENT_ID"] = false;

$arGadgetParams["USER_VAR"] = ($arGadgetParams["USER_VAR"]?$arGadgetParams["USER_VAR"]:"user_id");
$arGadgetParams["GROUP_VAR"] = ($arGadgetParams["GROUP_VAR"]?$arGadgetParams["GROUP_VAR"]:"group_id");
$arGadgetParams["PAGE_VAR"] = ($arGadgetParams["PAGE_VAR"]?$arGadgetParams["PAGE_VAR"]:"page");
$arGadgetParams["PATH_TO_USER"] = ($arGadgetParams["PATH_TO_USER"]?$arGadgetParams["PATH_TO_USER"]:"/company/personal/user/#user_id#/");
$arGadgetParams["PATH_TO_GROUP"] = ($arGadgetParams["PATH_TO_GROUP"]?$arGadgetParams["PATH_TO_GROUP"]:"/workgroups/group/#group_id#/");
$arGadgetParams["LIST_URL"] = ($arGadgetParams["LIST_URL"] ? $arGadgetParams["LIST_URL"] : (IsModuleInstalled("intranet") ? "/company/personal/log/" : "/club/log/"));

$arGadgetParams["SUBSCRIBE_ONLY"] = ($arGadgetParams["SUBSCRIBE_ONLY"] != "Y" ? "N" : "Y");

$arGadgetParams["LOG_CNT"] = ($arGadgetParams["LOG_CNT"] ? $arGadgetParams["LOG_CNT"] : 7);

if ($arGadgetParams["GROUP_ID"])
	$arResult["ActiveFeatures"] = CSocNetFeatures::GetActiveFeaturesNames(SONET_ENTITY_GROUP, $arGadgetParams["GROUP_ID"]);
else
	$arResult["ActiveFeatures"] = array();

if ($arGadgetParams["EVENT_ID"] == "system")
	$sTitle = GetMessage('GD_UPDATES_ENTITY_SYSTEM');
elseif ($arGadgetParams["EVENT_ID"] == "forum")
	$sTitle = (array_key_exists("forum", $arResult["ActiveFeatures"]) && strlen($arResult["ActiveFeatures"]["forum"]) > 0 ? $arResult["ActiveFeatures"]["forum"] : GetMessage('GD_UPDATES_ENTITY_FORUM'));
elseif ($arGadgetParams["EVENT_ID"] == "blog")
	$sTitle = (array_key_exists("blog", $arResult["ActiveFeatures"]) && strlen($arResult["ActiveFeatures"]["blog"]) > 0 ? $arResult["ActiveFeatures"]["blog"] : GetMessage('GD_UPDATES_ENTITY_BLOG'));
elseif ($arGadgetParams["EVENT_ID"] == "tasks")
	$sTitle = (array_key_exists("tasks", $arResult["ActiveFeatures"]) && strlen($arResult["ActiveFeatures"]["tasks"]) > 0 ? $arResult["ActiveFeatures"]["tasks"] : GetMessage('GD_UPDATES_ENTITY_TASKS'));
elseif ($arGadgetParams["EVENT_ID"] == "calendar")
	$sTitle = (array_key_exists("calendar", $arResult["ActiveFeatures"]) && strlen($arResult["ActiveFeatures"]["calendar"]) > 0 ? $arResult["ActiveFeatures"]["calendar"] : GetMessage('GD_UPDATES_ENTITY_CALENDAR'));
elseif ($arGadgetParams["EVENT_ID"] == "photo")
	$sTitle = (array_key_exists("photo", $arResult["ActiveFeatures"]) && strlen($arResult["ActiveFeatures"]["photo"]) > 0 ? $arResult["ActiveFeatures"]["photo"] : GetMessage('GD_UPDATES_ENTITY_PHOTO'));
elseif ($arGadgetParams["EVENT_ID"] == "files")
	$sTitle = (array_key_exists("files", $arResult["ActiveFeatures"]) && strlen($arResult["ActiveFeatures"]["files"]) > 0 ? $arResult["ActiveFeatures"]["files"] : GetMessage('GD_UPDATES_ENTITY_FILES'));
else
	$sTitle = "";

if (strlen($arGadgetParams["EVENT_ID"]) > 0)
	$arGadget["TITLE"] .= " [".$sTitle."]";
	
if($arGadgetParams["SHOW_TITLE"] == "Y"):
	?><h4><?= GetMessage("GD_LOG_ENTITY_TITLE") ?></h4><?
endif;

$APPLICATION->IncludeComponent(
	"bitrix:socialnetwork.log",
	$arGadgetParams["TEMPLATE_NAME"],
	Array(
		"ENTITY_TYPE" => "",
		"GROUP_ID" => $arGadgetParams["GROUP_ID"],		
		"EVENT_ID" => $arGadgetParams["EVENT_ID"],
		"USER_VAR" => $arGadgetParams["USER_VAR"],
		"GROUP_VAR" => $arGadgetParams["GROUP_VAR"],
		"PAGE_VAR" => $arGadgetParams["PAGE_VAR"],
		"PATH_TO_USER" => $arGadgetParams["PATH_TO_USER"],
		"PATH_TO_GROUP" => $arGadgetParams["PATH_TO_GROUP"],
		"SET_TITLE" => "N",
		"AUTH" => "N",
		"LOG_DATE_DAYS" => $arGadgetParams["LOG_DATE_DAYS"],
		"LOG_CNT" => $arGadgetParams["LOG_CNT"],
		"ITEMS_COUNT" => $arGadgetParams["ITEMS_COUNT"],
		"SET_NAV_CHAIN" => "N",
		"PATH_TO_MESSAGES_CHAT" => $arParams["PM_URL"],
		"PATH_TO_VIDEO_CALL" => $arParams["PATH_TO_VIDEO_CALL"],
		"PATH_TO_CONPANY_DEPARTMENT" => $arParams["PATH_TO_CONPANY_DEPARTMENT"],
		"DATE_TIME_FORMAT" => $arParams["DATE_TIME_FORMAT"],
		"SHOW_YEAR" => $arParams["SHOW_YEAR"],		
		"NAME_TEMPLATE" => $arParams["NAME_TEMPLATE"],
		"SHOW_LOGIN" => $arParams["SHOW_LOGIN"],
		"SUBSCRIBE_ONLY" => $arGadgetParams["SUBSCRIBE_ONLY"],
		"SHOW_EVENT_ID_FILTER" => "N"
	),
	$component,
	Array("HIDE_ICONS"=>"Y")
);
?>
<?
if(strlen($arGadgetParams["LIST_URL"])>0):
	?><br /><br />
	<div align="right"><a href="<?=htmlspecialchars($arGadgetParams["LIST_URL"])?>"><?echo GetMessage("GD_LOG_ENTITY_MORE")?></a> <a href="<?=htmlspecialchars($arGadgetParams["LIST_URL"])?>"><img width="7" height="7" border="0" src="/bitrix/images/socialnetwork/icons/arrows.gif" /></a>
	<br />
	</div><?
endif?>