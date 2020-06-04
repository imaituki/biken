<?php /* Smarty version Smarty-3.1.18, created on 2020-06-04 09:14:21
         compiled from "./index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3211881785ed760e04ab257-67844931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8b82e36b14a5b32b9082c90cfde424dcce75e56' => 
    array (
      0 => './index.tpl',
      1 => 1591229654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3211881785ed760e04ab257-67844931',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ed760e04cef56_76764741',
  'variables' => 
  array (
    'template_meta' => 0,
    'template_javascript' => 0,
    'template_header' => 0,
    'message' => 0,
    'arr_post' => 0,
    'OptionTime' => 0,
    'template_footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ed760e04cef56_76764741')) {function content_5ed760e04cef56_76764741($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_select_date2')) include '/usr/home/haw1007mxp9i/html/cgi-data/smarty/libs/plugins/function.html_select_date2.php';
if (!is_callable('smarty_function_html_options')) include '/usr/home/haw1007mxp9i/html/cgi-data/smarty/libs/plugins/function.html_options.php';
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_meta']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="/common2/css/import.css">
 <link rel="stylesheet" href="/common2/css/style.css">
 <link rel="stylesheet" href="/common2/css/layout.css">
 <link rel="stylesheet" href="/common2/css/base.css">
 <link rel="stylesheet" href="/common2/css/bootstrap-3-grid.css">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_javascript']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
</head>
<body id="contact">
<div id="base">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<main>
<div id="body">
	<section>
		<div class="wrapper center entry">
			<h2 class="hl_3"><span>カウンセリングご予約</span></h2>
			<div class="box">
					<form action="./check.php#form" method="post">
						<table class="tbl_form">
							<tbody>
								<tr>
									<th scope="row">お名前<span class="need">必須</span></th>
									<td>
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['name'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['name'];?>
</span><?php }?>
										<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['name'];?>
">
									</td>
								</tr>
								<tr>
									<th scope="row">フリガナ<span class="need">必須</span></th>
									<td>
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['ruby'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['ruby'];?>
</span><?php }?>
										<input type="text" name="ruby" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['ruby'];?>
">
									</td>
								</tr>
								<tr>
									<th scope="row">メールアドレス<span class="need">必須</span></th>
									<td>
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['mail'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['mail'];?>
</span><?php }?>
										<input type="text" name="mail" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['mail'];?>
" maxlength="255" >
									</td>
								</tr>
								<tr>
									<th scope="row">電話番号<span class="need">必須</span></th>
									<td>
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['tel'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['tel'];?>
</span><?php }?>
										<input type="text" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['tel'];?>
" maxlength="13" class="w150" placeholder="090-000-000">
									</td>
								</tr>
								<tr>
									<th scope="row">生年月日<span class="need">必須</span></th>
									<td>
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['birthday'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['birthday'];?>
</span><?php }?>
										<?php echo smarty_function_html_select_date2(array('field_array'=>'birthday','field_order'=>'ymd','order_format'=>"%Y年 %M月 %D日",'prefix'=>'','year_empty'=>"--",'month_empty'=>"--",'day_empty'=>"--",'end_year'=>"-100",'month_format'=>"%m",'time'=>(($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['birthday'])===null||$tmp==='' ? "0000-00-00" : $tmp),'reverse_years'=>true),$_smarty_tpl);?>

									</td>
								</tr>
								<tr class="border_none">
									<th scope="row">ご希望日時（第1希望）<span class="need">必須</span></th>
									<td>
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['date1'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['date1'];?>
</span><?php }?>
										<input name="date1" class="datepicker" readonly="readonly" placeholder="年/月/日" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['date1'];?>
">
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['time1'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['time1'];?>
</span><?php }?>
										<select name="time1" id="time1" class="mb10">
											<option value="">選択してください</option>
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['OptionTime']->value,'selected'=>$_smarty_tpl->tpl_vars['arr_post']->value['time1']),$_smarty_tpl);?>

										</select>
									</td>
								</tr>
								<tr class="border_none">
									<th scope="row">ご希望日時（第2希望）<span class="need">必須</span></th>
									<td>
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['date2'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['date2'];?>
</span><?php }?>
										<input name="date2" class="datepicker" readonly="readonly" placeholder="年/月/日" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['date2'];?>
">
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['time2'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['time2'];?>
</span><?php }?>
										<select name="time2" id="time2" class="mb10">
											<option value="">選択してください</option>
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['OptionTime']->value,'selected'=>$_smarty_tpl->tpl_vars['arr_post']->value['time2']),$_smarty_tpl);?>

										</select>
									</td>
								</tr>
								<tr>
									<th scope="row">ご希望日時（第3希望）<span class="need">必須</span></th>
									<td>
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['date3'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['date3'];?>
</span><?php }?>
										<input name="date3" class="datepicker" readonly="readonly" placeholder="年/月/日" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['date3'];?>
">
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['time3'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['time3'];?>
</span><?php }?>
										<select name="time3" id="time3" class="mb10">
											<option value="">選択してください</option>
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['OptionTime']->value,'selected'=>$_smarty_tpl->tpl_vars['arr_post']->value['time3']),$_smarty_tpl);?>

										</select>
									</td>
								</tr>
								<tr class="last">
									<th scope="row">備考内容</th>
									<td>
										<?php if (!empty($_smarty_tpl->tpl_vars['message']->value['ng']['comment'])) {?><span class="error">※<?php echo $_smarty_tpl->tpl_vars['message']->value['ng']['comment'];?>
</span><?php }?>
										<textarea rows="5" name="comment"><?php echo $_smarty_tpl->tpl_vars['arr_post']->value['comment'];?>
</textarea>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="pos_ac form_button mb20">
							<button class="button" type="submit">入力内容を確認する<i class="fas fa-chevron-circle-right"></i></button>
						</div>
					</form>
				</div>
		</div>
	</section>
</div>
</main>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<script>

$(function(){
	$(".datepicker").datepicker({
		dateFormat: 'yy/mm/dd',
		minDate: "+1d",
		showButtonPanel: true,
		closeText: '選択解除',
		onClose: function (){
			var event = arguments.callee.caller.caller.arguments[0];
			if ($(event.delegateTarget).hasClass('ui-datepicker-close')) { $(this).val(''); }
		},
		beforeShowDay: function (date) {
			var ymd = date.getFullYear() + ('0' + (date.getMonth() + 1)).slice(-2) + ('0' +  date.getDate()).slice(-2);
			if (date.getDay() == 3) {
				// 水曜日
				return [false, 'ui-state-disabled'];
			} else {
				 // 平日
				return [true, ''];
			}
		}
	});
});

</script>
</body>
</html>
<?php }} ?>
