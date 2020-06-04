<?php /* Smarty version Smarty-3.1.18, created on 2020-06-03 18:04:49
         compiled from "./check.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16031332155ed766df177cb7-59797723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b4b2052636ec9f26a16ab03f9e8ef7a8dc00733' => 
    array (
      0 => './check.tpl',
      1 => 1591175080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16031332155ed766df177cb7-59797723',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ed766df203274_41353889',
  'variables' => 
  array (
    'template_meta' => 0,
    'template_javascript' => 0,
    'template_header' => 0,
    'arr_post' => 0,
    'OptionTime' => 0,
    'template_footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ed766df203274_41353889')) {function content_5ed766df203274_41353889($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/usr/home/haw1007mxp9i/html/cgi-data/smarty/libs/plugins/modifier.date_format.php';
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
				<p class="mb10 c_red">まだフォームの送信は完了していません。</p>
				<p class="mb30">下記内容をご確認の上、「送信する」ボタンを押してください。</p>
				<form action="./#form" method="post">
					<table class="tbl_form mb50 check">
						<tbody>
							<tr>
								<th scope="row">お名前</th>
								<td><?php echo $_smarty_tpl->tpl_vars['arr_post']->value['name'];?>
<input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['name'];?>
"></td>
							</tr>
							<tr>
								<th scope="row">フリガナ</th>
								<td><?php echo $_smarty_tpl->tpl_vars['arr_post']->value['ruby'];?>
<input type="hidden" name="ruby" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['ruby'];?>
"></td>
							</tr>
							<tr>
								<th scope="row">メールアドレス</th>
								<td>
									<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['mail'];?>

									<input type="hidden" name="mail" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['mail'];?>
">
								</td>
							</tr>
							<tr>
								<th scope="row">電話番号</th>
								<td>
									<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['tel'];?>

									<input type="hidden" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['tel'];?>
">
								</td>
							</tr>
							<tr>
								<th scope="row">生年月日</th>
								<td>
									<?php echo smarty_modifier_date_format(implode($_smarty_tpl->tpl_vars['arr_post']->value['birthday'],"/"),"%Y年%m月%d日");?>

									<input type="hidden" name="birthday[Year]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['birthday']['Year'])===null||$tmp==='' ? '' : $tmp);?>
">
									<input type="hidden" name="birthday[Month]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['birthday']['Month'])===null||$tmp==='' ? '' : $tmp);?>
">
									<input type="hidden" name="birthday[Day]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['birthday']['Day'])===null||$tmp==='' ? '' : $tmp);?>
">
								</td>
							</tr>
							<tr>
								<th scope="row">ご希望日時（第1希望）</th>
								<td>
									<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['date1'];?>
 <?php echo $_smarty_tpl->tpl_vars['OptionTime']->value[$_smarty_tpl->tpl_vars['arr_post']->value['time1']];?>

									<input type="hidden" name="date1" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['date1'];?>
">
									<input type="hidden" name="time1" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['time1'];?>
">
								</td>
							</tr>
							<tr>
								<th scope="row">ご希望日時（第2希望）</th>
								<td>
									<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['date2'];?>
 <?php echo $_smarty_tpl->tpl_vars['OptionTime']->value[$_smarty_tpl->tpl_vars['arr_post']->value['time2']];?>

									<input type="hidden" name="date2" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['date2'];?>
">
									<input type="hidden" name="time2" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['time2'];?>
">
								</td>
							</tr>
							<tr>
								<th scope="row">ご希望日時（第3希望）</th>
								<td>
									<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['date3'];?>
 <?php echo $_smarty_tpl->tpl_vars['OptionTime']->value[$_smarty_tpl->tpl_vars['arr_post']->value['time3']];?>

									<input type="hidden" name="date3" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['date3'];?>
">
									<input type="hidden" name="time3" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['time3'];?>
">
								</td>
							</tr>
							<tr>
								<th scope="row">備考</th>
								<td>
									<?php echo nl2br($_smarty_tpl->tpl_vars['arr_post']->value['comment']);?>

									<input type="hidden" name="comment" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['comment'];?>
">
								</td>
							</tr>
						</tbody>
					</table>
					<div class="row form_button _check">
						<div class="col-sm-6 mb20 left">
							<button class="button _back" type="submit"><i class="fas fa-chevron-circle-left"></i>修正する</button>
						</div>
						<div class="col-sm-6 right">
							<button id="send_button" class="button" type="submit">送信する<i class="fas fa-chevron-circle-right"></i></button>
						</div>
					</div>
				</form>
			</div>
        </div>
	</section>
</div>
</main>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body>
</html>
<?php }} ?>
