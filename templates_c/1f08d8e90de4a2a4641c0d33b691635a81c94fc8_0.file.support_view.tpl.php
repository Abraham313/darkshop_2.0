<?php
/* Smarty version 3.1.32, created on 2019-08-16 23:26:20
  from 'D:\xampp\htdocs\templates\v1\Main\support_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d571f7ce70ed2_83178489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f08d8e90de4a2a4641c0d33b691635a81c94fc8' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Main\\support_view.tpl',
      1 => 1565990776,
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
function content_5d571f7ce70ed2_83178489 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Amount</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <input name="addBalance" style="display: none;" value="1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Amount to add</label>
                        <input type="number" class="form-control" name="amount" id="amount" aria-describedby="amount" placeholder="5">
                        <small id="amount" class="form-text text-muted">Enter the Amount you want to add in USD($).</small>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Finish Payment -></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/support">Support</a>
            </li>
            <li class="breadcrumb-item "><a href="#">Ticket</a></li>
            <li class="breadcrumb-item active"><?php echo $_smarty_tpl->tpl_vars['ticket']->value['title'];?>
</li>
        </ol>


        <div class="row">
            <div class="col-md-12">



                <div class="media msg">
                    <div class="media-body">
                     <!--    <small class="pull-right time"><i class="fa fa-clock-o"></i> <?php echo $_smarty_tpl->tpl_vars['ticket']->value['create_date'];?>
</small> -->
                        <h5 class="media-heading">
                            <?php if ($_smarty_tpl->tpl_vars['user']->value['id'] != $_smarty_tpl->tpl_vars['ticket']->value['user_id']) {?> First Question: <?php } else {
echo $_smarty_tpl->tpl_vars['user']->value['username'];
}?>
                            </h5>

                        <small class="col-lg-10"><?php echo $_smarty_tpl->tpl_vars['ticket']->value['description'];?>
</small>
                    </div>
                </div>



                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'message');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
?>


                    <div class="card media msg  <?php if ($_smarty_tpl->tpl_vars['message']->value['user_id'] != $_smarty_tpl->tpl_vars['ticket']->value['user_id']) {?> admin-message-wrapper <?php }?>">

                        <div class="media-wrapper">
                            <div class="media-owner">
                                <h5 class="media-heading"> <b><?php echo $_smarty_tpl->tpl_vars['message']->value['username'];?>
</b></h5>
                            </div>
                            <div class="media-body">
                                <small > <?php echo $_smarty_tpl->tpl_vars['message']->value['description'];?>
</small>
                            </div>
                     <!--       <small class="pull-right time"><i class="fa fa-clock-o"></i> <?php echo $_smarty_tpl->tpl_vars['message']->value['created_at'];?>
</small> -->
                        </div>
                    </div>



                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


<?php if ($_smarty_tpl->tpl_vars['ticket']->value['status'] != "closed") {?>
    <form method="post">

        <input class="form-control" value="1" name="reply" style="display: none">


        <label>Reply:</label>
        <textarea class="form-control" name="description"></textarea>
        <br>
        <input class="form-control" type="submit" value="Send Reply">

    </form>

    <form method="post"> <input name="closeTicket" value="<?php echo $_smarty_tpl->tpl_vars['ticket']->value['id'];?>
" hidden> <input type="submit" value="Close Ticket "></form>
<?php }?>

            </div>

        </div>


    </div>
    <!-- /.container-fluid -->



</div>




<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
