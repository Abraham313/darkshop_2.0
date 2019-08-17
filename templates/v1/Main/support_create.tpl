
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
            <li class="breadcrumb-item active">Create Ticket</li>
        </ol>


        <div class="row">
            <div class="col-md-12">

                <form method="post">

                    <input class="form-control" value="1" name="openTicket" style="display: none">

                    <label>Title:</label>
                    <input class="form-control" type="text" name="title">
                    <br>
                    <label>Problem:</label>
                    <textarea class="form-control" name="description"></textarea>
                    <br>
                    <input class="form-control" type="submit" value="Open Ticket">

                </form>

            </div>

        </div>


    </div>
    <!-- /.container-fluid -->



</div>




{include file="footer.tpl"}
