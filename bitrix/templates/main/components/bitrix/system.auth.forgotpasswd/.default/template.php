<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);

?>
<div class="fgt_pass">
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p>
		<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>
	<p>
		<?=GetMessage("AUTH_FORGOT_PASSWORD_2")?>
	</p>
	<table class="data-table bx-forgotpass-table">
		<thead>
			<tr> 
				<td colspan="2"><b class="label"><?=GetMessage("AUTH_GET_CHECK_STRING")?></b></td>
			</tr>
		</thead>
		<tbody>
			<tr> 
				<td><?=GetMessage("AUTH_EMAIL")?></td>
				<td>
					<input type="text" name="USER_EMAIL" maxlength="255" />
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr> 
				<td colspan="2">
					<input type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
				</td>
			</tr>
		</tfoot>
	</table>
<p class="add_link">
<a href="/personal/"><b><?=GetMessage("AUTH_AUTH")?></b></a>
</p> 
</form>
</div>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
