<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CBPCreateDocumentActivity
	extends CBPActivity
{
	public function __construct($name)
	{
		parent::__construct($name);
		$this->arProperties = array(
			"Title" => "",
			"Fields" => null,
		);
	}

	public function Execute()
	{
		$rootActivity = $this->GetRootActivity();
		$documentId = $rootActivity->GetDocumentId();

		$documentService = $this->workflow->GetService("DocumentService");
		$documentService->CreateDocument($documentId, $this->Fields);

		return CBPActivityExecutionStatus::Closed;
	}

	public static function GetPropertiesDialog($documentType, $activityName, $arWorkflowTemplate, $arWorkflowParameters, $arWorkflowVariables, $arCurrentValues = null, $formName = "", $popupWindow = null)
	{
		$runtime = CBPRuntime::GetRuntime();

		if (!is_array($arWorkflowParameters))
			$arWorkflowParameters = array();
		if (!is_array($arWorkflowVariables))
			$arWorkflowVariables = array();

		$documentService = $runtime->GetService("DocumentService");
		$arDocumentFieldsTmp = $documentService->GetDocumentFields($documentType);

		$arFieldTypes = $documentService->GetDocumentFieldTypes($documentType);

		if (!is_array($arCurrentValues))
		{
			$arCurrentValues = array();

			$arCurrentActivity = &CBPWorkflowTemplateLoader::FindActivityByName($arWorkflowTemplate, $activityName);
			if (is_array($arCurrentActivity["Properties"])
				&& array_key_exists("Fields", $arCurrentActivity["Properties"])
				&& is_array($arCurrentActivity["Properties"]["Fields"]))
			{
				foreach ($arCurrentActivity["Properties"]["Fields"] as $k => $v)
				{
					$arCurrentValues[$k] = $v;

					if ($arDocumentFieldsTmp[$k]["BaseType"] == "user")
					{
						if (!is_array($arCurrentValues[$k]))
							$arCurrentValues[$k] = array($arCurrentValues[$k]);

						$ar = array();
						foreach ($arCurrentValues[$k] as $v)
						{
							if (intval($v)."!" == $v."!")
								$v = "user_".$v;
							$ar[] = $v;
						}

						$arCurrentValues[$k] = CBPHelper::UsersArrayToString($ar, $arWorkflowTemplate, $documentType);
					}
				}
			}
		}

		$arDocumentFields = array();
		$defaultFieldValue = "";
		foreach ($arDocumentFieldsTmp as $key => $value)
		{
			if (!$value["Editable"])
				continue;

			$arDocumentFields[$key] = $value;
			if (strlen($defaultFieldValue) <= 0)
				$defaultFieldValue = $key;

			if ($value["BaseType"] == "select" || $value["BaseType"] == "bool")
			{
				if (array_key_exists($key."_1", $arCurrentValues)
					&& ($value["Multiple"] && count($arCurrentValues[$key."_1"]) > 0
						|| !$value["Multiple"] && strlen($arCurrentValues[$key."_1"]) > 0)
					)
				{
					$arCurrentValues[$key] = $arCurrentValues[$key."_1"];
				}
			}
		}

		$javascriptFunctions = $documentService->GetJSFunctionsForFields($documentType, "objFieldsCD", $arDocumentFields, $arFieldTypes);

		return $runtime->ExecuteResourceFile(
			__FILE__,
			"properties_dialog.php",
			array(
				"arCurrentValues" => $arCurrentValues,
				"arDocumentFields" => $arDocumentFields,
				"formName" => $formName,
				"defaultFieldValue" => $defaultFieldValue,
				"arFieldTypes" => $arFieldTypes,
				"javascriptFunctions" => $javascriptFunctions,
				"documentType" => $documentType,
				"popupWindow" => &$popupWindow,
			)
		);
	}

	public static function GetPropertiesDialogValues($documentType, $activityName, &$arWorkflowTemplate, &$arWorkflowParameters, &$arWorkflowVariables, $arCurrentValues, &$arErrors)
	{
		$arErrors = array();

		$runtime = CBPRuntime::GetRuntime();

		$arProperties = array("Fields" => array());

		$documentService = $runtime->GetService("DocumentService");
		$arDocumentFields = $documentService->GetDocumentFields($documentType);

		foreach ($arDocumentFields as $fieldKey => $fieldValue)
		{
			if (!$fieldValue["Editable"])
				continue;

			$r = null;

			$fieldKey1 = $fieldKey;
			if (array_key_exists($fieldKey1, $arCurrentValues))
			{
				$r = (strlen($arCurrentValues[$fieldKey1]) > 0 ? $arCurrentValues[$fieldKey1] : $arCurrentValues[$fieldKey1."_1"]);
				if ($fieldValue["BaseType"] == "user")
				{
					if (!is_array($r))
						$r = array($r);

					$ar = array();
					foreach ($r as $v)
					{
						$v1 = CBPHelper::UsersStringToArray($v, $documentType, $arErrors);
						if (count($arErrors) > 0)
							return false;
						foreach ($v1 as $v2)
							$ar[] = (substr($v2, 0, strlen("user_")) == "user_") ? substr($v2, strlen("user_")) : $v2;
					}

					if (count($ar) == 0)
						$r = null;
					elseif (count($ar) == 1)
						$r = $ar[0];
					else
						$r = $ar;
				}
			}

			if ($fieldValue["Required"] && ($r == null))
			{
				$arErrors[] = array(
					"code" => "emptyRequiredField",
					"message" => str_replace("#FIELD#", $fieldValue["Name"], GetMessage("BPCDA_FIELD_REQUIED")),
				);
			}

			if ($r != null)
				$arProperties["Fields"][$fieldKey] = $r;
		}

		if (count($arErrors) > 0)
			return false;

		$arCurrentActivity = &CBPWorkflowTemplateLoader::FindActivityByName($arWorkflowTemplate, $activityName);
		$arCurrentActivity["Properties"] = $arProperties;

		return true;
	}
}
?>