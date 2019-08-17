<?php
/* Smarty version 3.1.32, created on 2019-08-10 21:28:54
  from 'D:\xampp\htdocs\templates\v1\Main\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d4f1af61fd178_04747270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '202a2fd824fcdaab8e5b240c69b8f0ce39b011a1' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Main\\index.tpl',
      1 => 1565465332,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5d4f1af61fd178_04747270 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>


<a href="/register">Register</a>
<a href="/login">Login</a>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
