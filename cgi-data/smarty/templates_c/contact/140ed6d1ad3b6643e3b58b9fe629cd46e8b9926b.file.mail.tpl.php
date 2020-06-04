<?php /* Smarty version Smarty-3.1.18, created on 2020-06-03 20:09:55
         compiled from "./mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:748442725ed767bf1aba78-70783128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '140ed6d1ad3b6643e3b58b9fe629cd46e8b9926b' => 
    array (
      0 => './mail.tpl',
      1 => 1591182589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '748442725ed767bf1aba78-70783128',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ed767bf1d9c42_01169188',
  'variables' => 
  array (
    'arr_post' => 0,
    'OptionTime' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ed767bf1d9c42_01169188')) {function content_5ed767bf1d9c42_01169188($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/usr/home/haw1007mxp9i/html/cgi-data/smarty/libs/plugins/modifier.date_format.php';
?>--------------------------------------------------------
[お名前]
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['name'])===null||$tmp==='' ? '' : $tmp);?>


[フリガナ]
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['ruby'])===null||$tmp==='' ? '' : $tmp);?>


[メールアドレス]
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['mail'])===null||$tmp==='' ? '' : $tmp);?>


[電話番号]
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['tel'])===null||$tmp==='' ? '' : $tmp);?>


[ 生年月日 ]
<?php echo smarty_modifier_date_format(implode($_smarty_tpl->tpl_vars['arr_post']->value['birthday'],"/"),"%Y年%m月%d日");?>


[ご希望日時（第1希望）]
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['date1'])===null||$tmp==='' ? '' : $tmp);?>
 <?php echo $_smarty_tpl->tpl_vars['OptionTime']->value[$_smarty_tpl->tpl_vars['arr_post']->value['time1']];?>


[ご希望日時（第2希望）]
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['date2'])===null||$tmp==='' ? '' : $tmp);?>
 <?php echo $_smarty_tpl->tpl_vars['OptionTime']->value[$_smarty_tpl->tpl_vars['arr_post']->value['time2']];?>


[ご希望日時（第3希望）]
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['date3'])===null||$tmp==='' ? '' : $tmp);?>
 <?php echo $_smarty_tpl->tpl_vars['OptionTime']->value[$_smarty_tpl->tpl_vars['arr_post']->value['time3']];?>


[備考内容]
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['comment'])===null||$tmp==='' ? '' : $tmp);?>

<?php }} ?>
