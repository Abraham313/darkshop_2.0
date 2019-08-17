<?php
/* Smarty version 3.1.32, created on 2019-08-15 21:36:36
  from 'D:\xampp\htdocs\templates\v1\Admin_main\users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d55b444affc70_39332022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc228cdfe764043eeada9ee7d6b365eaed34ec19' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Admin_main\\users.tpl',
      1 => 1565897795,
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
function content_5d55b444affc70_39332022 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
        </ol>


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Users</div>
                    <table class="table">
                        <tr>

                        </tr>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allUser']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                            <tr>
                                <th><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['user']->value['amount_in_usd'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['user']->value['created_at'];?>
</th>
                                <th><?php if ($_smarty_tpl->tpl_vars['user']->value['rank'] == 100) {?>
                                        Admin
                                     <?php } else { ?>
                                        Member
                                    <?php }?>
                                </th>
                                <th> <a href="/admin/users/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Edit Account</a>  </th>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
            </div>


        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
