
{include file="header.tpl" title=foo}
{include file="nav.tpl" title=foo}

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
                    Server Time:  <b>{$cronjob_log.Servertime}</b> <br>
                    Last payment Sync at: <b>{$cronjob_log.execution_date}</b>
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
                   {foreach from=$payments_today  item=payment}
                       <tr>
                           <td>{$payment.username}</td>
                           <td>{if $payment.payed == 1} Pending {else} Payed{/if}</td>
                           <td>{$payment.public_key} </td>
                           <td>$ {$payment.balance_usd}</td>
                           <td>{$payment.date}</td>
                       </tr>
                   {/foreach}

               </table>
           </div>
           <div class="col-md-6">
               <h3 style="text-align: center;">Botshop Sales</h3>
               <table class="table">
                   <tr>
                       <th>Access ID</th>
                       <th>Load Amount</th>
                       <th>User</th>
                   </tr>
               {foreach from=$allOrders  item=order}
                   <tr>
                       <td> <a href="/bot_loads/statistics/{$order.api_id}">{$order.api_id}</td>
                       <td>{$order.load_amount}</td>
                       <td>{$order.username}</td>
                   </tr>
               {/foreach}
               </table>
           </div>
       </div>
    </div>
</div>
{include file="footer.tpl"}
