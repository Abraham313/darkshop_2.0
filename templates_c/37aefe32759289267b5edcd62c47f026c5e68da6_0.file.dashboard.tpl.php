<?php
/* Smarty version 3.1.32, created on 2019-08-21 19:50:42
  from 'D:\xampp\htdocs\templates\v1\Admin_main\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d5d84725053b7_97689469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37aefe32759289267b5edcd62c47f026c5e68da6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Admin_main\\dashboard.tpl',
      1 => 1566409840,
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
function content_5d5d84725053b7_97689469 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <a style="width: 40%;" class="btn btn-dark" href="/admin/support">Open Support Center</a>
                <a style="width: 40%;" class="btn btn-dark" href="/admin/users">Users List</a><br>
                <br>

                <a style="width: 40%;" class="btn btn-dark" href="/admin/fileserver"> File Server Settings</a>
                <a style="width: 40%;" class="btn btn-dark" href="/admin/botshop"> Botshop Settings</a><br>

            </div>
            <div class="col-md-6">
                <div class="alert alert-primary" role="alert">
                    Server Time:  <b><?php echo $_smarty_tpl->tpl_vars['cronjob_log']->value['Servertime'];?>
</b> <br>
                    Last payment Sync at: <b><?php echo $_smarty_tpl->tpl_vars['cronjob_log']->value['execution_date'];?>
</b>
                </div>
            </div>
        </div>
        <hr>
        <br>
       <div class="row">
           <div class="col-md-6">
               <h3 style="text-align: center;">Account Topups</h3>
               <table class="table">
                   <tr>
                       <th>Username</th>
                       <th>Status</th>
                       <th> Address</th>
                       <th> Balance</th>
                       <th>Date</th>
                   </tr>
                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments_today']->value, 'payment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->value) {
?>
                       <tr>
                           <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['username'];?>
</td>
                           <td><?php if ($_smarty_tpl->tpl_vars['payment']->value['payed'] == 1) {?> Pending <?php } else { ?> Payed<?php }?></td>
                           <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['public_key'];?>
 </td>
                           <td>$ <?php echo $_smarty_tpl->tpl_vars['payment']->value['balance_usd'];?>
</td>
                           <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['date'];?>
</td>
                       </tr>
                   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

               </table>
           </div>
           <div class="col-md-6">
               <h3 style="text-align: center;">Botshop Sales</h3>
               <table class="table">
                   <tr>
                       <th>Access ID</th>
                       <th>Load Amount</th>
                       <th>User</th>
                       <th>Created</th>
                       <th>Suspend</th>
                   </tr>
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allOrders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
                   <tr>
                       <td> <a href="/bot_loads/statistics/<?php echo $_smarty_tpl->tpl_vars['order']->value['api_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['order']->value['api_id'];?>
</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['order']->value['load_amount'];?>
</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['order']->value['username'];?>
</td>
                       <td><?php echo $_smarty_tpl->tpl_vars['order']->value['created_at'];?>
</td>
                       <td>
                           <?php if ($_smarty_tpl->tpl_vars['order']->value['status'] == "active") {?>
                               <form method="post"><input type="submit" value="Suspend Order"> <input type="text" name="suspend" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" hidden> </form>
                           <?php } else { ?>
                               <form method="post"><input type="submit" value="Allow Order"> <input type="text" name="suspend" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" hidden> </form>
                           <?php }?>
                      </td>
                   </tr>
               <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
               </table>
           </div>
       </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
