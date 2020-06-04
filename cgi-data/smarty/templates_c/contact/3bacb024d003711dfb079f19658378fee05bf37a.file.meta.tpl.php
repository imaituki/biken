<?php /* Smarty version Smarty-3.1.18, created on 2020-06-03 17:35:44
         compiled from "/usr/home/haw1007mxp9i/html/common2/include/meta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19446166235ed760e04d1c01-52606708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bacb024d003711dfb079f19658378fee05bf37a' => 
    array (
      0 => '/usr/home/haw1007mxp9i/html/common2/include/meta.tpl',
      1 => 1591169351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19446166235ed760e04d1c01-52606708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_HTML_HEADER' => 0,
    '_HTML_HEADER_DEFAULT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ed760e04debc5_87888403',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ed760e04debc5_87888403')) {function content_5ed760e04debc5_87888403($_smarty_tpl) {?><title><?php if ($_smarty_tpl->tpl_vars['_HTML_HEADER']->value['title_original']!=null) {?><?php echo $_smarty_tpl->tpl_vars['_HTML_HEADER']->value['title_original'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['_HTML_HEADER']->value['title']!=null) {?><?php echo $_smarty_tpl->tpl_vars['_HTML_HEADER']->value['title'];?>
 | <?php }?><?php echo $_smarty_tpl->tpl_vars['_HTML_HEADER_DEFAULT']->value['title'];?>
<?php }?></title>
<meta name="description" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['_HTML_HEADER']->value['description'])===null||$tmp==='' ? '' : $tmp);?>
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['_HTML_HEADER_DEFAULT']->value['description'])===null||$tmp==='' ? '' : $tmp);?>
">
<meta name="keyword" content="<?php if ((($tmp = @$_smarty_tpl->tpl_vars['_HTML_HEADER']->value['keyword'])===null||$tmp==='' ? '' : $tmp)) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['_HTML_HEADER']->value['keyword'])===null||$tmp==='' ? '' : $tmp);?>
,<?php }?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['_HTML_HEADER_DEFAULT']->value['keyword'])===null||$tmp==='' ? '' : $tmp);?>
">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/common2/favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="/common2/favicon/favicon.ico" type="image/vnd.microsoft.icon">
<link rel="apple-touch-icon" href="/common2/favicon/apple-touch-icon.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton&display=swap">
<?php }} ?>
