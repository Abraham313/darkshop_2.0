<?php
/* Smarty version 3.1.32, created on 2019-08-16 14:58:22
  from 'D:\xampp\htdocs\templates\v1\nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5d56a86e5cfa58_48758613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd68e3b9284e833550b56fc1ff33fca55961b06b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\templates\\v1\\nav.tpl',
      1 => 1565960301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d56a86e5cfa58_48758613 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/dashboard">RBT-MARKET</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger"><?php echo $_smarty_tpl->tpl_vars['tickets']->value['waiting_user'];?>
</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                <a class="dropdown-item" href="/support">Go To Tickets</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
    <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                <?php if ($_smarty_tpl->tpl_vars['user']->value['planInfo']) {?>
                    <b>Plan:</b> <?php echo $_smarty_tpl->tpl_vars['user']->value['planInfo']['name'];?>
 <br>
                    <b>USD:</b> $ <?php echo $_smarty_tpl->tpl_vars['user']->value['amount_in_usd'];?>
 <br>
                    <b>Expire:</b> <?php if ($_smarty_tpl->tpl_vars['user']->value['expire']) {?> <?php echo $_smarty_tpl->tpl_vars['user']->value['expire'];?>
 <?php } else { ?> Lifetime <?php }?>
                <?php } else { ?>
                    No Plan
                <?php }?>
                </a>
                <a class="dropdown-item" href="/settings">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>


<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/bot_loads">
                <i class="fas fa-fw fa-globe"></i>
                <span>Load's Shop</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/support">
                <i class="fas fa-fw fa-ticket-alt"></i>
                <span>Support</span>
            </a>
        </li>

        <?php if ($_smarty_tpl->tpl_vars['isAdmin']->value) {?>
            <li class="nav-item">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-rocket"></i>
                    <span>Admin Center</span>
                </a>
            </li>
        <?php }?>
        <!--  <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-fw fa-folder"></i>
                 <span>Services</span>
             </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                 <h6 class="dropdown-header">Bots/Computing:</h6>
                 <a class="dropdown-item" href="/bot_loads">Load's Shop</a>

                 <h6 class="dropdown-header">IP/Networking:</h6>
                 <a class="dropdown-item" href="/socks_shop">Socks's Shop</a>
             </div>
        </li> -->
      <!--  <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li> -->
    </ul><?php }
}
