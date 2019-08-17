<?php
/* Smarty version 3.1.32, created on 2019-08-15 21:59:46
  from 'D:\xampp\htdocs\templates\v1\Admin_main\users_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d55b9b275c869_02053736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eac18918f783d62825628e17b32bdedaa16ca49d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Admin_main\\users_edit.tpl',
      1 => 1565899184,
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
function content_5d55b9b275c869_02053736 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li class="breadcrumb-item">    <a href="/admin/users">Users </a></li>
            <li class="breadcrumb-item active">Edit -> <?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</li>
        </ol>


        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
" id="username" aria-describedby="username_helper" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
" disabled>
                <small id="username_helper" class="form-text text-muted">We'll this should be a unique name.</small>
            </div>
            <div class="form-group">
                <label for="usd">Account Balance</label>
                <input type="text" name="amount_in_usd" class="form-control" id="usd" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['amount_in_usd'];?>
">
            </div>
            <button type="submit" class="btn btn-primary">Edit User</button>
        </form>

        <?php echo print_r($_smarty_tpl->tpl_vars['user']->value);?>



    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
