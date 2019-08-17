<?php
/* Smarty version 3.1.32, created on 2019-08-13 17:40:10
  from 'D:\xampp\htdocs\templates\v1\Main\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d52d9dac44ec7_47538181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d8ca078dcf858682962ccfbe2df4112b43c322b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Main\\login.tpl',
      1 => 1565710797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5d52d9dac44ec7_47538181 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" id="inputEmail" class="form-control" placeholder="username" name="username" required="required" autofocus="autofocus">
                        <label for="inputEmail">Username</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required">
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me">
                            Remember Password
                        </label>
                    </div>
                </div>
          <input type="submit" class="btn btn-success">
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="/register">Register an Account</a>

            </div>
        </div>
    </div>
</div>
<?php }
}
