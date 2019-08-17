

{include file="header.tpl" title=foo}
{include file="nav.tpl" title=foo}

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item">    <a href="/admin/users">Users </a></li>
            <li class="breadcrumb-item active">Edit -> {$user.username}</li>
        </ol>


        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="{$user.username}" id="username" aria-describedby="username_helper" value="{$user.username}" disabled>
                <small id="username_helper" class="form-text text-muted">We'll this should be a unique name.</small>
            </div>
            <div class="form-group">
                <label for="usd">Account Balance</label>
                <input type="text" name="amount_in_usd" class="form-control" id="usd" value="{$user.amount_in_usd}">
            </div>
            <button type="submit" class="btn btn-primary">Edit User</button>
        </form>

        {$user|print_r}


    </div>
</div>
{include file="footer.tpl"}
