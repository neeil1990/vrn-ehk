<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$pageId = "user_tasks";
include("util_menu.php");
include("util_profile.php");
?>
<?
if (CSocNetFeatures::IsActiveFeature(SONET_ENTITY_USER, $arResult["VARIABLES"]["user_id"], "tasks"))
{
	?>
	<?
	if (COption::GetOptionString("intranet", "use_tasks_2_0", "N") == "Y")
	{
		$APPLICATION->IncludeComponent(
			$arResult["VARIABLES"]["action"] == "edit" ? "bitrix:tasks.task.edit" : "bitrix:tasks.task.detail",
			".default",
			Array(
				"USER_ID" => $arResult["VARIABLES"]["user_id"],
				"PAGE_VAR" => $arResult["ALIASES"]["page"],
				"USER_VAR" => $arResult["ALIASES"]["user_id"],
				"VIEW_VAR" => $arResult["ALIASES"]["view_id"],
				"TASK_VAR" => $arResult["ALIASES"]["task_id"],
				"ACTION_VAR" => $arResult["ALIASES"]["action"],
				"ACTION" => $arResult["VARIABLES"]["action"],
				"TASK_ID" => $arResult["VARIABLES"]["task_id"],
				"PATH_TO_USER_PROFILE" => $arResult["PATH_TO_USER"],
				"PATH_TO_MESSAGES_CHAT" => $arResult["PATH_TO_MESSAGES_CHAT"],
				"PATH_TO_CONPANY_DEPARTMENT" => $arParams["PATH_TO_CONPANY_DEPARTMENT"],
				"PATH_TO_VIDEO_CALL" => $arResult["PATH_TO_VIDEO_CALL"],
				"PATH_TO_USER_TASKS" => $arResult["PATH_TO_USER_TASKS"],
				"PATH_TO_USER_TASKS_TASK" => $arResult["PATH_TO_USER_TASKS_TASK"],
				"PATH_TO_USER_TASKS_VIEW" => $arResult["PATH_TO_USER_TASKS_VIEW"],
				"PATH_TO_FORUM_SMILE" => $arParams["PATH_TO_FORUM_SMILE"],
				"PATH_TO_GROUP" => $arParams["PATH_TO_GROUP"],
				"TASKS_FIELDS_SHOW" => $arParams["TASKS_FIELDS_SHOW"],
				"SET_NAV_CHAIN" => $arResult["SET_NAV_CHAIN"],
				"SET_TITLE" => $arResult["SET_TITLE"],
				"FORUM_ID" => $arParams["TASK_FORUM_ID"],
				"NAME_TEMPLATE" => $arParams["NAME_TEMPLATE"],
				"SHOW_LOGIN" => $arParams["SHOW_LOGIN"],
				"DATE_TIME_FORMAT" => $arResult["DATE_TIME_FORMAT"],
				"SHOW_YEAR" => $arParams["SHOW_YEAR"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"THUMBNAIL_LIST_SIZE" => 30,
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
	}
	else
	{
		$APPLICATION->IncludeComponent("bitrix:intranet.tasks.menu", ".default", Array(
				"IBLOCK_ID" => $arParams["TASK_IBLOCK_ID"],
				"OWNER_ID" => $arResult["VARIABLES"]["user_id"],
				"TASK_TYPE" => 'user',
				"PAGE_VAR" => $arResult["ALIASES"]["page"],
				"USER_VAR" => $arResult["ALIASES"]["user_id"],
				"VIEW_VAR" => $arResult["ALIASES"]["view_id"],
				"TASK_VAR" => $arResult["ALIASES"]["task_id"],
				"ACTION_VAR" => $arResult["ALIASES"]["action"],
				"ACTION" => $arResult["VARIABLES"]["action"],
				"TASK_ID" => $arResult["VARIABLES"]["task_id"],
				"PATH_TO_USER_TASKS" => $arResult["PATH_TO_USER_TASKS"],
				"PATH_TO_USER_TASKS_TASK" => $arResult["PATH_TO_USER_TASKS_TASK"],
				"PATH_TO_USER_TASKS_VIEW" => $arResult["PATH_TO_USER_TASKS_VIEW"],
				"PAGE_ID" => "user_tasks_task",
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
		$zzz = $APPLICATION->IncludeComponent(
			"bitrix:intranet.tasks.create",
			".default",
			Array(
				"IBLOCK_ID" => $arParams["TASK_IBLOCK_ID"],
				"OWNER_ID" => $arResult["VARIABLES"]["user_id"],
				"TASK_TYPE" => 'user',
				"PAGE_VAR" => $arResult["ALIASES"]["page"],
				"USER_VAR" => $arResult["ALIASES"]["user_id"],
				"VIEW_VAR" => $arResult["ALIASES"]["view_id"],
				"TASK_VAR" => $arResult["ALIASES"]["task_id"],
				"ACTION_VAR" => $arResult["ALIASES"]["action"],
				"ACTION" => $arResult["VARIABLES"]["action"],
				"TASK_ID" => $arResult["VARIABLES"]["task_id"],
				"PATH_TO_USER" => $arResult["PATH_TO_USER"],
				"PATH_TO_MESSAGES_CHAT" => $arResult["PATH_TO_MESSAGES_CHAT"],
				"PATH_TO_CONPANY_DEPARTMENT" => $arParams["PATH_TO_CONPANY_DEPARTMENT"],
				"PATH_TO_VIDEO_CALL" => $arResult["PATH_TO_VIDEO_CALL"],
				"PATH_TO_USER_TASKS" => $arResult["PATH_TO_USER_TASKS"],
				"PATH_TO_USER_TASKS_TASK" => $arResult["PATH_TO_USER_TASKS_TASK"],
				"PATH_TO_USER_TASKS_VIEW" => $arResult["PATH_TO_USER_TASKS_VIEW"],
				"TASKS_FIELDS_SHOW" => $arParams["TASKS_FIELDS_SHOW"],
				"SET_NAV_CHAIN" => $arResult["SET_NAV_CHAIN"],
				"SET_TITLE" => $arResult["SET_TITLE"],
				"FORUM_ID" => $arParams["TASK_FORUM_ID"],
				"NAME_TEMPLATE" => $arParams["NAME_TEMPLATE"],
				"SHOW_LOGIN" => $arParams["SHOW_LOGIN"],
				"DATE_TIME_FORMAT" => $arResult["DATE_TIME_FORMAT"],
				"SHOW_YEAR" => $arParams["SHOW_YEAR"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"THUMBNAIL_LIST_SIZE" => 30,
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);

		if ($zzz && IntVal($arResult["VARIABLES"]["task_id"]) > 0 && $arResult["VARIABLES"]["action"] == "view")
		{
			?>
			<br /><br />
			<?
			$APPLICATION->IncludeComponent(
				"bitrix:forum.topic.reviews",
				"",
				Array(
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"MESSAGES_PER_PAGE" => $arParams["ITEM_DETAIL_COUNT"],
					"USE_CAPTCHA" => "N",
					"PREORDER" => "Y",
					"PATH_TO_SMILE" => $arParams["PATH_TO_FORUM_SMILE"],
					"FORUM_ID" => $arParams["TASK_FORUM_ID"],
					"URL_TEMPLATES_READ" => $arParams["URL_TEMPLATES_READ"],
					"SHOW_LINK_TO_FORUM" => "N",
					"ELEMENT_ID" => $arResult["VARIABLES"]["task_id"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
		}
	}
}
?>