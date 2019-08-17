<?php
/* Smarty version 3.1.32, created on 2019-08-17 13:01:23
  from 'D:\xampp\htdocs\templates\v1\Admin_main\fileserver.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d57de83401bf9_34481663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb1bab3f0ec997f3cf79d7ee6476156c43506355' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Admin_main\\fileserver.tpl',
      1 => 1566039680,
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
function content_5d57de83401bf9_34481663 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Fileserver Settings</li>
        </ol>


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Fileserver API</div>
            <div class="card-body">
                <form method="post">
                    <input type="text" placeholder="API URL" value="<?php echo $_smarty_tpl->tpl_vars['apiInfo']->value['url'];?>
" class="form-control" name="api_url">
                    <br>

                    <input type="text" placeholder="API KEY" value="<?php echo $_smarty_tpl->tpl_vars['apiInfo']->value['api_key'];?>
" class="form-control" name="api_key">
                    <br>
                    <br>
                    <input type="submit" value="Save" class="form-control" name="update_fileserver_api">
                </form>
            </div>


        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
