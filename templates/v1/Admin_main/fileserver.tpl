
{include file="header.tpl" title=foo}
{include file="nav.tpl" title=foo}

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Fileserver Settings</li>
        </ol>


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Fileserver API</div>
            <div class="card-body">
                <form method="post">
                    <input type="text" placeholder="API URL" value="{$apiInfo.url}" class="form-control" name="api_url">
                    <br>

                    <input type="text" placeholder="API KEY" value="{$apiInfo.api_key}" class="form-control" name="api_key">
                    <br>
                    <br>
                    <input type="submit" value="Save" class="form-control" name="update_fileserver_api">
                </form>
            </div>


        </div>
    </div>
    {include file="footer.tpl"}
