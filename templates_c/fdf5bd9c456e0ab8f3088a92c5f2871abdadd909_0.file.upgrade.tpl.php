<?php
/* Smarty version 3.1.32, created on 2019-08-10 22:06:24
  from 'D:\xampp\htdocs\templates\v1\Main\upgrade.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d4f23c052bac5_07695430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdf5bd9c456e0ab8f3088a92c5f2871abdadd909' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Main\\upgrade.tpl',
      1 => 1565467582,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4f23c052bac5_07695430 (Smarty_Internal_Template $_smarty_tpl) {
?>
Plan: <br>
<?php echo $_smarty_tpl->tpl_vars['plan']->value['name'];?>

<?php echo $_smarty_tpl->tpl_vars['plan']->value['price'];?>


<a href="/dashboard">Back</a><?php }
}
