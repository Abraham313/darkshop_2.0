
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
                <a href="#">Support</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>



        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="support-cout">
                  Your Global Tickets: {$ticketCount.new +  $ticketCount.waiting_user + $ticketCount.waiting_admin + $ticketCount.closed}
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="support-cout">
                Tickets waiting for a Reply: {$ticketCount.waiting_user}
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="support-cout">
                Tickets waiting on Admin Reply: {$ticketCount.waiting_admin + $ticketCount.new}
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="support-cout">
                Closed Tickets: {$ticketCount.closed}
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
    {foreach from=$allTickets item=ticket}
       <tr>
           <td> <a href="/support/ticket/{$ticket.id}">{$ticket.title}</a></td>
           <td> {$ticket.status}</td>
           <td><a href="/support/ticket/{$ticket.id}">Open Ticket</a></td>
       </tr>
    {/foreach}

</table>

</div>




{include file="footer.tpl"}
