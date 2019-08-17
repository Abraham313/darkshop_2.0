
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
{include file="header.tpl" title=foo}
{include file="nav.tpl"}
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/support">Support</a>
            </li>
            <li class="breadcrumb-item "><a href="#">Ticket</a></li>
            <li class="breadcrumb-item active">{$ticket.title}</li>
        </ol>


        <div class="row">
            <div class="col-md-12">



                <div class="media msg">
                    <div class="media-body">
                     <!--    <small class="pull-right time"><i class="fa fa-clock-o"></i> {$ticket.create_date}</small> -->
                        <h5 class="media-heading">
                            {if $user.id != $ticket.user_id} First Question: {else}{$user.username}{/if}
                            </h5>

                        <small class="col-lg-10">{$ticket.description}</small>
                    </div>
                </div>



                {foreach from=$messages item=message}


                    <div class="card media msg  {if $message.user_id != $ticket.user_id} admin-message-wrapper {/if}">

                        <div class="media-wrapper">
                            <div class="media-owner">
                                <h5 class="media-heading"> <b>{$message.username}</b></h5>
                            </div>
                            <div class="media-body">
                                <small > {$message.description}</small>
                            </div>
                     <!--       <small class="pull-right time"><i class="fa fa-clock-o"></i> {$message.created_at}</small> -->
                        </div>
                    </div>



                {/foreach}


{if $ticket.status != "closed"}
    <form method="post">

        <input class="form-control" value="1" name="reply" style="display: none">


        <label>Reply:</label>
        <textarea class="form-control" name="description"></textarea>
        <br>
        <input class="form-control" type="submit" value="Send Reply">

    </form>

    <form method="post"> <input name="closeTicket" value="{$ticket.id}" hidden> <input type="submit" value="Close Ticket "></form>
{/if}

            </div>

        </div>


    </div>
    <!-- /.container-fluid -->



</div>




{include file="footer.tpl"}
