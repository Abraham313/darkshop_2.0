<?php
/* Smarty version 3.1.32, created on 2019-08-21 19:45:30
  from 'D:\xampp\htdocs\templates\v1\BotShop\manage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d5d833a650b52_91587241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56331b583eb4a2d5a6312012dbcd88e5bd3a75fe' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\BotShop\\manage.tpl',
      1 => 1566409529,
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
function content_5d5d833a650b52_91587241 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>


    <div class="content-body">

        <div class="taskedit">
            <div class="row">


                <form class="col-md-8 " action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">

                        <!-- <p>Currently we are Loading from you latest Upload: <?php echo $_smarty_tpl->tpl_vars['order']->value['order']['order']['command'];?>
</p> -->
                        <div style="width: 80%">
                            <input type="file" class="upload" name="uploaded_file" data-height="100" accept=".exe" required>
                        </div>
                        <button style="float:right;" type="submit" class="btn btn-primary">Change Malware</button>
                    </div>


                </form>


                <form class="col-md-4" method="post">

                    <?php if ($_smarty_tpl->tpl_vars['order']->value['order']['order']['status'] == "1") {?>
                        <input name="changerunningtask" value="stop" hidden>

                        <button style="height: 100px; width: 100%" type="submit" class="btn btn-dark">
                            <h4 class="side">Your Order is Running<br>
                                <?php echo $_smarty_tpl->tpl_vars['order']->value['order']['order']['command'];?>
</h4>
                            <?php echo count($_smarty_tpl->tpl_vars['order']->value['order'])-1;?>
   /  <?php echo $_smarty_tpl->tpl_vars['order']->value['order']['order']['botamount'];?>

                            <div class="play-button-outer">
                                <div class="play-pause"></div>
                            </div>
                        </button>
                    <?php } else { ?>
                        <button style="height: 100px; width: 100%" type="submit" class="btn btn-dark">
                            <h4 class="side">Your Order is Paused<br>
                                <?php echo $_smarty_tpl->tpl_vars['order']->value['order']['order']['command'];?>
</h4>
                            <?php echo count($_smarty_tpl->tpl_vars['order']->value['order'])-1;?>
   /  <?php echo $_smarty_tpl->tpl_vars['order']->value['order']['order']['botamount'];?>

                            <div class="play-button-outer">
                                <div class="play-button"></div>
                            </div>
                        </button>

                        <input name="changerunningtask" value="start" hidden>
                    <?php }?>

                </form>
            </div>
        </div>


        <table class="table">
            <tr>
                <th>Country</th>
                <th>LoadUrl</th>
                <th>Execution Status</th>
                <th>Opering System</th>
                <th>Computername</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['order'], 'bot');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bot']->value) {
?>
                <?php if (!isset($_smarty_tpl->tpl_vars['bot']->value['address'])) {?>
                    <tr>
                        <td><!-- <img src="<?php echo $_smarty_tpl->tpl_vars['includeDir']->value;?>
assets/img/flags/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['bot']->value['country'], 'UTF-8');?>
.png"> --><?php echo $_smarty_tpl->tpl_vars['bot']->value['country'];?>
  </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['order']->value['order']['order']['loadurl'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['bot']->value['status'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['bot']->value['operingsystem'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['bot']->value['computrername'];?>
</td>

                    </tr>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    </div>
</div>






<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<?php echo '<script'; ?>
>
    $('.upload').dropify({
        messages: {
            'default': 'Upload a new File to change the current one',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });
<?php echo '</script'; ?>
>

<?php }
}
