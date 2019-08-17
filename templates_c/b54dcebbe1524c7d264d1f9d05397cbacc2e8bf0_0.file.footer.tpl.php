<?php
/* Smarty version 3.1.32, created on 2019-08-11 22:58:33
  from 'D:\xampp\htdocs\templates\v1\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d5081797b26d0_56724821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b54dcebbe1524c7d264d1f9d05397cbacc2e8bf0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\footer.tpl',
      1 => 1565557112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5081797b26d0_56724821 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['includeDir']->value;?>
assets/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['includeDir']->value;?>
assets/vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

<!-- Core plugin JavaScript-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['includeDir']->value;?>
assets/vendor/jquery-easing/jquery.easing.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['includeDir']->value;?>
assets/vendor/bootstrap-multiselect.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['includeDir']->value;?>
assets/vendor/dropify.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['includeDir']->value;?>
assets/vendor/toastr.js"><?php echo '</script'; ?>
>

<!-- Custom scripts for all pages-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['includeDir']->value;?>
assets/js/sb-admin.min.js"><?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->tpl_vars['currentAlerts']->value;?>



</body>

</html>
<?php }
}
