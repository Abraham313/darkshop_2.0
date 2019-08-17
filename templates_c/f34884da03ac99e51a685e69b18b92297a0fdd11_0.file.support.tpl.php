<?php
/* Smarty version 3.1.32, created on 2019-08-11 20:33:46
  from 'D:\xampp\htdocs\templates\v1\Main\support.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d505f8a0bcc51_03991984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f34884da03ac99e51a685e69b18b92297a0fdd11' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Main\\support.tpl',
      1 => 1565548424,
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
function content_5d505f8a0bcc51_03991984 (Smarty_Internal_Template $_smarty_tpl) {
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
                <a href="#">Support</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>



        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="support-cout">
                  Your Global Tickets: <?php echo $_smarty_tpl->tpl_vars['ticketCount']->value['new']+$_smarty_tpl->tpl_vars['ticketCount']->value['waiting_user']+$_smarty_tpl->tpl_vars['ticketCount']->value['waiting_admin']+$_smarty_tpl->tpl_vars['ticketCount']->value['closed'];?>

              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="support-cout">
                Tickets waiting for a Reply: <?php echo $_smarty_tpl->tpl_vars['ticketCount']->value['waiting_user'];?>

                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="support-cout">
                Tickets waiting on Admin Reply: <?php echo $_smarty_tpl->tpl_vars['ticketCount']->value['waiting_admin']+$_smarty_tpl->tpl_vars['ticketCount']->value['new'];?>

                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="support-cout">
                Closed Tickets: <?php echo $_smarty_tpl->tpl_vars['ticketCount']->value['closed'];?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <a href="/support/new">Create New Ticket</a>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

<table class="table">
    <tr>
        <th>Title</th>
        <th colspan="2">Status</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allTickets']->value, 'ticket');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->value) {
?>
       <tr>
           <td> <a href="/support/ticket/<?php echo $_smarty_tpl->tpl_vars['ticket']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ticket']->value['title'];?>
</a></td>
           <td> <?php echo $_smarty_tpl->tpl_vars['ticket']->value['status'];?>
</td>
           <td><a href="/support/ticket/<?php echo $_smarty_tpl->tpl_vars['ticket']->value['id'];?>
">Open Ticket</a></td>
       </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</table>

</div>




<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
