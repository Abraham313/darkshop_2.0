<?php
/* Smarty version 3.1.32, created on 2019-08-16 23:26:27
  from 'D:\xampp\htdocs\templates\v1\Admin_main\support.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d571f83204b33_79174126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d1ed0a55f6dc082fe77a1defea29f97225b14ca' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Admin_main\\support.tpl',
      1 => 1565990554,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5d571f83204b33_79174126 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Support</li>
        </ol>

        <table class="table">

            <tr>
                <th>Title</th>
                <th>From User</th>
                <th colspan="2">Status</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allTickets']->value, 'ticket');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->value) {
?>

                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['ticket']->value['title'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ticket']->value['username'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ticket']->value['status'];?>
</td>
                    <td><a target="_blank" href="/support/ticket/<?php echo $_smarty_tpl->tpl_vars['ticket']->value['id'];?>
">Open</a>     </td>
                </tr>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </table>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
