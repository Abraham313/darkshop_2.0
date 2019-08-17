<?php
/* Smarty version 3.1.32, created on 2019-08-16 23:56:37
  from 'D:\xampp\htdocs\templates\v1\Main\settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d5726957e4274_03151771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eeb96268ba0bc0465b1cb31ba4942fb6769d8e14' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Main\\settings.tpl',
      1 => 1565992595,
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
function content_5d5726957e4274_03151771 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Account Settings</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row" >
            <form method="post">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
" id="username" aria-describedby="username_helper" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
" disabled>
                    <small id="username_helper" class="form-text text-muted">We'll this should be a unique name.</small>
                </div>

                <div class="form-group">
                    <label for="usd">Password</label>
                    <input type="text" name="edit_pass" class="form-control" id="usd" value="" >
                    <small id="username_helper" class="form-text text-muted">Enter a new password and click Edit</small>
                </div>
                <button type="submit" class="btn btn-primary">Edit User</button>
            </form>
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->

</div>




<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
