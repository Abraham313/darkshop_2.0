<?php
/* Smarty version 3.1.32, created on 2019-08-17 18:18:38
  from 'D:\xampp\htdocs\templates\v1\Main\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d5828de7624c9_36069643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42e7a7ab759ac6395c51ac4d5058b996de2192d2' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\Main\\dashboard.tpl',
      1 => 1566058713,
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
function content_5d5828de7624c9_36069643 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <input type="number" class="form-control" name="amount" id="amount" aria-describedby="amount" value="50">
                        <small id="amount" class="form-text text-muted">Enter the Amount you want to add in USD($).</small>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Payment -></button>
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
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row" >

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100"  style="    height: 200px !important;">
                    
                    <div class="card-body">
                    <div class="card-body-icon">
                            <i class="fas fa-fw fa-money-check-alt"></i>
                    </div>

                    <div class="mr-5">
                            Account Balance
                             <p><b>$</b> <?php echo $_smarty_tpl->tpl_vars['user']->value['amount_in_usd'];?>
 </p>

                         </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#exampleModal">
                            <span class="float-left">Add Amount +</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>


            <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100" style="    height: 200px !important;">
                        
                        <div class="card-body">
                        <div class="card-body-icon">
                                <i class="fas fa-fw fa-money-check-alt"></i>
                        </div>
                        <div class="mr-5"><b>Load Shop</b>
                            <p>Here you can buy Bot Executions</p>
                            </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="/bot_loads" >
                                <span class="float-left">Go to Load Shop -></span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                    </div>
                </div>


            <div class="col-xl-3 col-sm-6 mb-3" style="display: none;">
                <div class="card text-white bg-success o-hidden h-25">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">Socks Proxy Shop
                        <p>Access to our Private Socks Proxys</p></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="/socks_shop">
                        <span class="float-left">Go to Socks Shop -></span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            <!--
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-25">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5">13 New Tickets!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div> -->
        </div>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Payments</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Address</th>
                            <th>Bitcoin Amount</th>
                            <th>Status</th>
                            <th>Date</th>

                        </tr>
                        </thead>
                    <!--    <tfoot>
                        <tr>
                            <th>Amount</th>
                            <th>Address</th>
                            <th>Bitcoin Amount</th>
                            <th>Success</th>
                            <th>Date</th>

                        </tr>
                        </tfoot> -->
                        <tbody>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments']->value, 'payment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->value) {
?>
                            <tr class="<?php if ($_smarty_tpl->tpl_vars['payment']->value['payed'] == 2) {?>payed<?php } else { ?>open<?php }?>">
                                <td>$ <?php echo $_smarty_tpl->tpl_vars['payment']->value['balance_usd'];?>
</td>
                                <td><a target="_blank" href="https://www.blockchain.com/en/btc/address/<?php echo $_smarty_tpl->tpl_vars['payment']->value['public_key'];?>
"> <?php echo $_smarty_tpl->tpl_vars['payment']->value['public_key'];?>
 </a></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['min_btc'];?>
</td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['payment']->value['payed']) {?>
                                            <?php if ($_smarty_tpl->tpl_vars['payment']->value['payed'] == 2) {?>
                                                Payed
                                                <?php } else { ?>
                                                Pending
                                            <?php }?>
                                        <?php } else { ?>
                                        No Transaction
                                    <?php }?>

                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['create_date'];?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>



    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->

</div>




<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
